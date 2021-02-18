<?php
session_start();

include('BDD.php');

if (isset($_POST['formconnexion'])) {

  try {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = sha1($_POST['password']);
    if (!empty($pseudo) AND !empty($password)) {
      $requser = $dbc->prepare("SELECT * FROM client WHERE PSEUDO_CLIENT = ? AND PASSWORD_CLIENT = ?");
      $requser -> execute(array($pseudo, $password));
      $reqemploye = $dbc->prepare("SELECT * FROM employe WHERE PSEUDO_EMPLOYE = ? AND PASSWORD_EMPLOYE = ?");
      $reqemploye -> execute(array($pseudo, $password));
      $userexist = $requser->rowCount();
      $userexist2 = $reqemploye->rowCount();
      if ($userexist == 1 OR $userexist2 == 1) {
        $reqactif = $dbc->prepare("SELECT * FROM client WHERE PSEUDO_CLIENT=? AND ESTACTIF_CLIENT=1");
        $reqactif->execute(array($pseudo));
        $actifexist = $reqactif->fetch();

        $reqactif2 = $dbc->prepare("SELECT * FROM employe WHERE PSEUDO_EMPLOYE=? AND ESTACTIF_EMPLOYE=1");
        $reqactif2->execute(array($pseudo));
        $actifexist2 = $reqactif2->fetch();

        if (!empty($actifexist)) {
          $userinfo = $requser->fetch();


          $_SESSION['ID_CLIENT'] = $userinfo['ID_CLIENT'];
          $_SESSION['PSEUDO_CLIENT'] = $userinfo['PSEUDO_CLIENT'];
          $_SESSION['EMAIL_CLIENT'] = $userinfo['EMAIL_CLIENT'];
          $_SESSION['TELEPHONE_CLIENT'] = $userinfo['TELEPHONE_CLIENT'];
          $_SESSION['PASSWORD_CLIENT'] = $userinfo['PASSWORD_CLIENT'];

          header("Location: index.php");
        }

        elseif (!empty($actifexist2)) {
          $userinfo2 = $reqemploye->fetch();
          $_SESSION['ID_EMPLOYE'] = $userinfo2['ID_EMPLOYE'];
          $_SESSION['PSEUDO_EMPLOYE'] = $userinfo2['PSEUDO_EMPLOYE'];
          $_SESSION['EMAIL_EMPLOYE'] = $userinfo2['EMAIL_EMPLOYE'];
          $_SESSION['TELEPHONE_EMPLOYE'] = $userinfo2['TELEPHONE_EMPLOYE'];
          $_SESSION['PASSWORD_EMPLOYE'] = $userinfo2['PASSWORD_EMPLOYE'];

          header("Location: index.php");
        }

        else {
          $erreur ="Votre compte a été désactivé !";
        }
      }

      else {
        $erreur = "Mauvais pseudo ou mot de passe !";
      }
    }
    else {
      $erreur = "Tous les champs doivent être complétés !";
    }

  } catch (PDOException $e) {
    header("Location:error.php?message=".$e->getMessage());
    exit();
  }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">
  <link rel="icon" type="image/png" href="images/logo.bmp" />
  <title>Connexion - Yatara massages</title>

</head>
<body>
    <link rel="stylesheet" href="CSS/form.css" />
  <?php include('nav.php') ?>
  <link rel="stylesheet" href="CSS/boot1.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <main>
    <div class="card-body px-lg-5 pt-0">

      <!-- Form -->
      <form style="color: #757575;" action="#!" method="POST">

        <div class="container contact">
          <div class="row">
            <div class="col-md-3">
              <div class="contact-info">
                <h2  class="text-center">Se connecter</h2>
              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="pseudo">Nom d'utilisateur<span class="redstar">*</span></label>
                    <input type="text" class="form-control" id="fname" placeholder="Nom d'utilisateur..." name="pseudo" style="width: 60%;">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="password">Mot de passe<span class="redstar">*</span></label>
                    <input type="password" class="form-control" id="lname" placeholder="Mot de passe..." name="password" style="width: 60%">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="formconnexion">Login</button>
                  </div>
                  <?php if (isset($erreur)) {
                    echo '<font color="red">'.$erreur.'</font>';
                  }
                  elseif(isset($success)){
                    echo '<font color="green">'.$success.'</font>';
                  }
                  ?>
                </div>
                <a class="finForm" href="register.php" style="color: gray;">Pas de compte ?</a><br>
                <a class="finForm" href="recupMdp.php" style="color: gray;">Mot de passe oublié ?</a><br><br>
                <span class="redstar">*</span> Champs obligatoires
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
  <?php include('footer.php') ?>
</body>
</html>
