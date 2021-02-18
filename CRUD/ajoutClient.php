<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

if (isset($_POST['forminscription'])) {
  if (!empty($_POST['nomPersonne']) AND !empty($_POST['prenomPersonne']) AND !empty($_POST['email']) AND !empty($_POST['dateDeNaissance']) AND !empty($_POST['tel']) AND !empty($_POST['pseudo']) AND !empty($_POST['pass'])){
    if ($_POST['type'] == "Client") {


      $nomPersonne = htmlspecialchars($_POST['nomPersonne']);
      $prenomPersonne = htmlspecialchars($_POST['prenomPersonne']);
      $email = htmlspecialchars($_POST['email']);
      $dateDeNaissance = htmlspecialchars($_POST['dateDeNaissance']);
      $tel = htmlspecialchars($_POST['tel']);
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $pass = sha1($_POST['pass']);
      $repeatPass = sha1($_POST['repeatPass']);
      $estActifClient = 1;

      $pseudoLength = strlen($pseudo);
      if ($pseudoLength <= 20) {
        if ($pass == $repeatPass) {
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $dbc->prepare("SELECT * FROM client WHERE EMAIL_CLIENT = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();

            $reqpseudo = $dbc->prepare("SELECT * FROM client WHERE PSEUDO_CLIENT = ?");
            $reqpseudo->execute(array($pseudo));
            $pseudoexist = $reqpseudo->rowCount();

            $reqtel = $dbc->prepare("SELECT * FROM client WHERE TELEPHONE_CLIENT = ?");
            $reqtel->execute(array($tel));
            $telexist = $reqtel->rowCount();

            if ($mailexist == 0) {
              if ($pseudoexist == 0) {
                if ($telexist == 0) {

                  $insClient = $dbc->prepare("INSERT INTO client(NOM_CLIENT, PRENOM_CLIENT, DATE_DE_NAISSANCE_CLIENT, EMAIL_CLIENT, TELEPHONE_CLIENT, PSEUDO_CLIENT, PASSWORD_CLIENT, ESTACTIF_CLIENT) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                  $insClient->execute(array($nomPersonne, $prenomPersonne, $dateDeNaissance, $email, $tel, $pseudo, $pass, $estActifClient));
                  $_SESSION['comptecree'] = "Votre compte a bien été crée !";
                  header('Location: ../index.php');
                }
                else {
                  $erreur = "Ce numéro de téléphone est déjà utilisé !";
                }
              }
              else {
                $erreur = "Ce pseudo existe déjà !";
              }
            }

            else {
              $erreur = "Adresse mail déjà utilisée !";
            }

          }

          else {
            $erreur = "Votre adresse email n'est pas valide !";
          }
        }

        else {
          $erreur = "Vos mots de passe ne correspondent pas !";
        }
      }
      else {
        $erreur = "Votre pseudo ne doit pas dépasser 20 caractères";
      }
    }
    else {


      $nomPersonne = htmlspecialchars($_POST['nomPersonne']);
      $prenomPersonne = htmlspecialchars($_POST['prenomPersonne']);
      $email = htmlspecialchars($_POST['email']);
      $dateDeNaissance = htmlspecialchars($_POST['dateDeNaissance']);
      $tel = htmlspecialchars($_POST['tel']);
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $pass = sha1($_POST['pass']);
      $repeatPass = sha1($_POST['repeatPass']);
      $estActifClient = 1;

      $pseudoLength = strlen($pseudo);
      if ($pseudoLength <= 20) {
        if ($pass == $repeatPass) {
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $dbc->prepare("SELECT * FROM employe WHERE EMAIL_EMPLOYE = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();

            $reqpseudo = $dbc->prepare("SELECT * FROM employe WHERE PSEUDO_EMPLOYE = ?");
            $reqpseudo->execute(array($pseudo));
            $pseudoexist = $reqpseudo->rowCount();

            $reqtel = $dbc->prepare("SELECT * FROM client WHERE TELEPHONE_CLIENT = ?");
            $reqtel->execute(array($tel));
            $telexist = $reqtel->rowCount();

            if ($mailexist == 0) {
              if ($pseudoexist == 0) {
                if ($telexist == 0) {

                  $insClient = $dbc->prepare("INSERT INTO employe(NOM_EMPLOYE, PRENOM_EMPLOYE, DATE_DE_NAISSANCE_EMPLOYE, EMAIL_EMPLOYE, TELEPHONE_EMPLOYE, PSEUDO_EMPLOYE, PASSWORD_EMPLOYE, ESTACTIF_EMPLOYE) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                  $insClient->execute(array($nomPersonne, $prenomPersonne, $dateDeNaissance, $email, $tel, $pseudo, $pass, $estActifClient));

                  $success = "Le compte a bien été créer !";
                }
                else {
                  $erreur = "Ce numéro de téléphone est déjà utilisé !";
                }
              }
              else {
                $erreur = "Ce pseudo existe déjà !";
              }
            }

            else {
              $erreur = "Adresse mail déjà utilisée !";
            }

          }

          else {
            $erreur = "Votre adresse email n'est pas valide !";
          }
        }

        else {
          $erreur = "Vos mots de passe ne correspondent pas !";
        }
      }
      else {
        $erreur = "Votre pseudo ne doit pas dépasser 20 caractères";
      }

    }


  }
  else {
    $erreur = "Tous les champs doivent être rempli";
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
  <title>Ajout client/admin - Yatara massages</title>

</head>
<body>

  <?php include('../nav1.php') ?>
  <link rel="stylesheet" href="../CSS/form.css" />
  <link rel="stylesheet" href="../CSS/boot1.css" />
  <main>
    <div class="card-body px-lg-5 pt-0">

      <!-- Form -->
      <form style="color: #757575;" action="#!" method="POST">

        <div class="container contact">
          <div class="row">
            <div class="col-md-3" class="text-center">
              <div class="contact-info text-center">
                <h2 class="text-center">Ajout d'un client/admin</h2>
                <a href="../admin/admin.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Retour</a><br>
              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Type de compte<span class="redstar">*</span></label>
                    <select name="type" class="form-control" placeholder="Choisissez un type de compte">
                      <optgroup label="Choix type de compte">
                        <option>Client</option>
                        <option>Admin</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Nom<span class="redstar">*</span></label>
                    <input type="text" class="form-control" id="fname" placeholder="Votre nom..." name="nomPersonne" value="<?php if(isset($_POST['nomPersonne'])) {echo $_POST['nomPersonne']; } ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Prénom<span class="redstar">*</span></label>
                    <input type="text" class="form-control" id="lname" placeholder="Votre prénom..." name="prenomPersonne" value="<?php if(isset($_POST['prenomPersonne'])) {echo $_POST['prenomPersonne']; } ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Adresse email<span class="redstar">*</span></label>
                    <input type="email" class="form-control" id="email" placeholder="Votre adresse email..." name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Date de naissance<span class="redstar">*</span></label>
                    <input type="date" class="form-control" id="lname" placeholder="Votre numéro de téléphone..." name="dateDeNaissance" value="<?php if(isset($_POST['dateDeNaissance'])) {echo $_POST['dateDeNaissance']; } ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Numéro de téléphone<span class="redstar">*</span></label>
                    <input type="text" class="form-control" id="lname" placeholder="Votre numéro de téléphone..."  name="tel" value="<?php if(isset($_POST['tel'])) {echo $_POST['tel']; } ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Nom d'utilisateur<span class="redstar">*</span></label>
                    <input type="text" class="form-control" id="lname" placeholder="Votre nom d'utilisateur..."  name="pseudo" value="<?php if(isset($_POST['pseudo'])) {echo $_POST['pseudo']; } ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Mot de passe<span class="redstar">*</span></label>
                    <input type="password" class="form-control" id="lname" placeholder="Votre mot de passe..." name="pass">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Confirmation mot de passe<span class="redstar">*</span></label>
                    <input type="password" class="form-control" id="lname" placeholder="Répéter le mot de passe..." name="repeatPass">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button style="width: 90px;" type="submit" class="btn btn-default" name="forminscription">Ajouter</button>
                  </div>
                  <?php if (isset($erreur)) {
                    echo '<font color="red">'.$erreur.'</font>';
                  }
                  elseif(isset($success)){
                    echo '<font color="green">'.$success.'</font>';
                  }
                  ?>
                </div>
                <span class="redstar">*</span> Champs obligatoire
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Form -->

    </div>
  </main>
  <?php include('../footer1.php') ?>
</body>
</html>
<?php }
else {
  echo "<html>
                <head>
                <body onload=\"javascript:alert('Connectez-vous avec un compte administrateur');window.location='../index.php'\">
                </body>
                </head>";
              }
   ?>
