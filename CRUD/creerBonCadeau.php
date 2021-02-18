<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php

include('../BDD.php');

$boncadeau = $dbc->query('SELECT * FROM bon_cadeau WHERE STATUT_BON_CADEAU = 0');


function passgen1($nbChar) {
  $chaine ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  srand((double)microtime()*1000000);
  $pass = '';
  for($i=0; $i<$nbChar; $i++){
    $pass .= $chaine[rand()%strlen($chaine)];
  }
  return $pass;
}

if (isset($_POST['formModif'])) {



    $code = passgen1(15);
    $stat = 1;
    $actif = 1;

    $ins = $dbc->prepare("UPDATE bon_cadeau SET CODE_BON_CADEAU =:code WHERE EMAIL_CLIENT = :email");
    $ins->bindParam(':email', $_POST['emailClient'], PDO::PARAM_STR);
    $ins->bindParam(':code', $code, PDO::PARAM_STR);
    $ins->execute();

    $ins2 = $dbc->prepare("UPDATE bon_cadeau SET STATUT_BON_CADEAU =:stat WHERE EMAIL_CLIENT = :email");
    $ins2->bindParam(':email', $_POST['emailClient'], PDO::PARAM_STR);
    $ins2->bindParam(':stat', $stat, PDO::PARAM_STR);
    $ins2->execute();

    $ins3 = $dbc->prepare("UPDATE bon_cadeau SET ESTACTIF_BON_CADEAU =:actif WHERE EMAIL_CLIENT = :email");
    $ins3->bindParam(':email', $_POST['emailClient'], PDO::PARAM_STR);
    $ins3->bindParam(':actif', $actif, PDO::PARAM_STR);
    $ins3->execute();

    $boncadeau1 = $dbc->query('SELECT * FROM bon_cadeau');

    $message = mail($_POST['emailClient'], 'Yatara massage - Bon cadeau  :  ', 'Voici le code de votre bon cadeau : ' .$code . ' Merci de votre commande et à bientôt chez Yatara massage !');




    $success = 'Votre bon a bien été créer';
  }
  else {
    $erreur = "Veuillez remplir tous les rempli.";
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
  <title>Créer un bon cadeau - Yatara massages</title>

</head>
<body>

  <?php include('../nav1.php') ?>
  <link rel="stylesheet" href="../CSS/form.css" />
  <link rel="stylesheet" href="../CSS/boot1.css" />
  <main>
    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

      <!-- Form -->
      <form style="color: #757575;"method="post" action="#!">

        <div class="container contact">
          <div class="row">
            <div class="col-md-3">
              <div class="contact-info">
                <h2 class="text-center" >Créer un bon cadeau</h2>
                <a href="../admin/admin.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Retour</a><br>

              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Choix du massage</label>
                    <select name="emailClient" class="form-control">
                      <optgroup label="adresse email:">
                        <?php
                        foreach ($boncadeau as $boncadeausolo): ?>

                        <option value="<?=  $boncadeausolo['EMAIL_CLIENT'] ?>"><?= $boncadeausolo['EMAIL_CLIENT']?></value>

                      <?php   endforeach; ?>

                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="formModif" class="btn btn-default">Créer</button>
                  </div>
                  <br><br>
                  <?php if (isset($erreur)) {
                    echo '<font color="red">'.$erreur.'</font>';
                  }?>

                  <?php if (isset($success)) {
                    echo '<font color="green">'.$success.'</font>';
                  }?>
                </div>
                <span class="redstar">*</span> Champs obligatoire
              </div>
            </div>
          </div>
        </div>
        <!-- Material form contact -->
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

