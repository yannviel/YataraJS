<?php
session_start();
include ('../BDD.php');

if (isset($_POST['formModif'])) {
  $idclient = $_SESSION['ID_CLIENT'];
  $email = htmlspecialchars($_POST['email']);
  $tel = htmlspecialchars($_POST['tel']);

  $idclient = $_SESSION['ID_CLIENT'];
  $mdp = $_POST['mdp'];
  $mdp2 = $_POST['mdp2'];
  $ancienPassword = $_POST['ancienPassword'];
  $mdpcrypte = sha1($_POST['mdp']);
  $mdp2crypte = sha1($_POST['mdp2']);
  $ancienPasswordcrypte = sha1($_POST['ancienPassword']);

  $requser = $dbc->prepare("SELECT * FROM client WHERE PASSWORD_CLIENT = ?");
  $requser -> execute(array($ancienPasswordcrypte));
  $userexist = $requser->rowCount();

  if (!empty($_POST['email'])) {
    $reqModif = $dbc-> prepare ("UPDATE client SET EMAIL_CLIENT = :email WHERE ID_CLIENT= :idclient");
    $reqModif->bindParam(':email', $email, PDO::PARAM_STR);
    $reqModif->bindParam(':idclient', $idclient, PDO::PARAM_STR);
    $reqModif->execute();
    $_SESSION['EMAIL_CLIENT'] = $email;
  } else {
    $erreur = "La modification n'a pas été efféctué. Les champs doivent être rempli.";
  }

  if (!empty($_POST['tel'])) {
    $reqModif = $dbc-> prepare ("UPDATE client SET TELEPHONE_CLIENT = :tel WHERE ID_CLIENT= :idclient");
    $reqModif->bindParam(':tel', $tel, PDO::PARAM_STR);
    $reqModif->bindParam(':idclient', $idclient, PDO::PARAM_STR);
    $reqModif->execute();
    $_SESSION['TELEPHONE_CLIENT'] = $tel;
  } else {
    $erreur = "La modification n'a pas été efféctué. Les champs doivent être rempli.";
  }

  if ($userexist == 1) {
    $userinfo = $requser->fetch();
    if ($mdp == $mdp2) {
      $reqModif = $dbc-> prepare ("UPDATE client SET PASSWORD_CLIENT = :mdp WHERE ID_CLIENT= :idclient");
      $reqModif->bindParam(':mdp', $mdpcrypte, PDO::PARAM_STR);
      $reqModif->bindParam(':idclient', $idclient, PDO::PARAM_STR);
      $reqModif->execute();
    }
    else {
      $erreur = "Vos deux mots de passe ne correspondent pas.";
    }
  } else {
    if (empty($ancienPassword) && empty($mdp) && empty($mdp2)) {

    } else {
      if (!empty($ancienPassword)) {
        $erreur = "Votre ancien mot de passe ne correspond pas.";
      } elseif (!empty($mdp)) {
        $erreur = "Tous les champs des mots de passe doivent être remplis.";
      } elseif (!empty($mdp2)) {
        $erreur = "Tous les champs des mots de passe doivent être remplis.";
      }
    }
  }
  $success = "Vos modifications ont bien été enregistrées.";
}

if (isset($_POST['supp'])) {
  $idclient = $_SESSION['ID_CLIENT'];
  $supp = htmlspecialchars($_POST['supp']);

  $reqModif = $dbc-> prepare ("UPDATE client SET ESTACTIF_CLIENT = 0 WHERE ID_CLIENT = :idclient");
  $reqModif->bindParam(':idclient', $idclient, PDO::PARAM_STR);
  $reqModif->execute();
  $success = "Votre bon compte a bien été supprimé.";
  $_SESSION = array();
  session_destroy();
  header("Location: ../index.php");
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
  <title>Espace Personnel - Yatara Massages</title>
  <link rel="icon" type="image/png" href="../images/logo.bmp" />
</head>
<body>
  <?php include('../nav1.php') ?>
  <link rel="stylesheet" href="../CSS/form.css" />
  <link rel="stylesheet" href="../CSS/boot1.css" />
  <main>
    <div class="card-body px-lg-5 pt-0">
      <form style="color: #757575;" action="#!" method="post">
        <div class="container contact">
          <div class="row">
            <div class="col-md-3">
              <div class="contact-info">
                <h2  class="text-center" >Espace client</h2>
              </div>
            </div>
            <div class="col-md-9">
              <?php if (isset($erreur)) {
                echo '<font color="red">'.$erreur.'</font>';
              }
              elseif(isset($success)){
                echo '<font color="green">'.$success.'</font>';
              }
              ?>
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="email">Modifier votre adresse de messagerie</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['EMAIL_CLIENT']; ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="password">Modifier votre numéro de téléphone</label>
                    <input class="form-control" type="text" name="tel" value="<?php echo $_SESSION['TELEPHONE_CLIENT']; ?>"/></div>
                  </div>
                  <div class="form-group">
                    <p style="margin-left: 2%">Vous souhaitez changer votre mot de passe ?</p>
                    <div class="col-sm-10">
                      <label for="password">Mot de passe actuel</label>
                      <input type="password"name="ancienPassword" class="form-control" placeholder="Votre mot de passe actuel..."/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <label for="password">Nouveau mot de passe</label>
                      <input type="password" name="mdp" class="form-control" placeholder="Votre nouveau mot de passe..."/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <label for="password">Confirmer le nouveau mot de passe</label>
                      <input type="password" name="mdp2" class="form-control" placeholder="Répétez votre nouveau mot de passe..."/>
                    </div>
                  </div>
				  <p style="margin-left: 2%">Valider vos modifications</p>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="formModif" class="btn btn-default" style="width:100px"><span>Confirmer</span></button>
                    </div>
                  </div>
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" style="background-color: #fe1b00; width: 180px;" name="supp" class="btn btn-default" style="width: 40%;" onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?')"><span>Supprimer votre <br>compte</span></button>
                  </div>
                  <p></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </main>
    <?php include('../footer1.php') ?>
  </body>
  </html>
