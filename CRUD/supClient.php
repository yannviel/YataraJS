<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

$soin = $dbc->query('SELECT * FROM client WHERE ESTACTIF_CLIENT = 1');

if (isset($_POST['formModif'])) {
  $email = htmlspecialchars($_POST['email']);

  $reqtype = $dbc->prepare("SELECT * FROM client WHERE EMAIL_CLIENT = ?");
  $reqtype->execute(array($email));
  $typeexist = $reqtype->fetch();

  if (!empty($typeexist)) {
    $reqModif = $dbc-> prepare ("UPDATE client SET ESTACTIF_CLIENT = 0 WHERE EMAIL_CLIENT = :email");
    $reqModif->bindParam(':email', $email, PDO::PARAM_STR);
    $reqModif->execute();
    $success = "La suppression a été effectué avec succès !";
  }
  else {
    $erreur = "Le client n'existe plus !";
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
  <title>Supprimer un client - Yatara massages</title>

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
                <h2 class="text-center">Supprimer un client</h2>
                <a href="../admin/admin.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Retour</a><br>
              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Email du client</label>
                    <select name="email" class="form-control">
                      <optgroup label="Email des clients">
                        <?php
                        foreach ($soin as $soinsolo ):
                          echo '<option value="'.$soinsolo['EMAIL_CLIENT'].'">'.$soinsolo['EMAIL_CLIENT'].'</value>';
                        endforeach;
                        ?>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button style="width:100px" type="submit" class="btn btn-default" name="formModif">Supprimer</button>
                  </div>
                  <?php if (isset($erreur)) {
                    echo '<font color="red">'.$erreur.'</font>';
                  }
                  elseif(isset($success)){
                    echo '<font color="green">'.$success.'</font>';
                  }
                  ?>
                </div>
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
