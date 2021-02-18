<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">
  <link rel="icon" type="image/png" href="../images/logo.bmp" />
  <title>Page administrateur - Yatara massages</title>
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
              <div class="contact-info">
                <h2 class="text-center titledmin">Page admin</h2>
                <div class="menuAdmin" style="text-align: center;">
                  <a href="admin.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Compte</a><br>
                  <a href="admin2.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Soin</a><br>
                  <a href="admin3.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Blog</a><br>
                  <a href="admin4.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Produit</a><br>
                  <a href="admin5.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Bon Cadeau</a><br>
                  <span class="btn btn-default" style="background-color:gray; Color:black; text-decoration:none; margin-bottom: 9px; width: 150px;  font-size: 130%;">Réservation</span><br>

                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10" style="margin-left:1px;">
                    <a href="../CRUD/ajoutReservation" class="btn btn-default" style="height: 85px; margin-top:150px; width:24%; background-color:#e2725b; Color:white; text-decoration:none;">Ajouter une <br> réservation</a>
                    <a href="../CRUD/afficherReservation" class="btn btn-default" style="height: 85px; margin-top:150px; width:24%; background-color:#e2725b; Color:white; text-decoration:none;">Afficher une <br> réservation</a>
                    <a href="../CRUD/modifReservation" class="btn btn-default" style="height: 85px; margin-top:150px; width:24%; background-color:#e2725b; Color:white; text-decoration:none;">Modifier une <br> réservation</a>
                    <a href="../CRUD/supReservation" class="btn btn-default" style="height: 85px; margin-top:150px; width:24%; background-color:#e2725b; Color:white; text-decoration:none;">Supprimer une <br> réservation</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Form -->

    </div>
  </main>
  <?php include('../footer.php') ?>
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
