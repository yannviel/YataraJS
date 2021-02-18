<?php
include('../BDD.php');

session_start();
$duree1h = '1h';
$duree1h15 = '1h15';
$duree1h30 = '1h30';

$prix1 = '130 CHF';
$prix2 = '160 CHF';
$prix3 = '190 CHF';


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
  <title>Commande bon cadeau</title>

</head>
<body>

  <?php include('../nav1.php') ?>
  <link rel="stylesheet" href="../CSS/form.css" />
  <link rel="stylesheet" href="../CSS/boot1.css" />
  <main>
    <div class="card-body px-lg-5 pt-0">

      <!-- Form -->
      <form style="color: #757575;" action="" method="POST" enctype="multipart/form-data">

        <div class="container contact">
          <div class="row">
            <div class="col-md-3" class="text-center">
              <div class="contact-info">
                <h2 class="text-center">Commande du bon cadeau</h2>
              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <h4>Récapitulatif de la commande :</h4>

                  <?php
                  echo "email  : ".$_GET['email'];
                  echo "<br>";

                    echo "durée du massage : ".$_GET['duree'];
                    echo "<br>";

                    echo "prix total : ";
                    if ($_GET['duree'] == $duree1h){
                      echo $prix1;
                    } elseif ($_GET['duree']== $duree1h15 ){
                      echo $prix2;
                    } elseif ($_GET['duree'] == $duree1h30 ){
                      echo $prix3;
                    }
                  ?>
				  <br><br>
				  Pour le paiement :
                  <br><br>
                  Veuillez envoyer la somme totale sur twint au 078 797 93 92.
				  <br><br>
				  Veillez à inclure votre adresse mail dans "message" lors du paiement.
                  <br><br>
                  Une fois votre paiement  reçu votre bon vous sera envoyé sous 24h.


                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button style="width: 90px;" type="submit" class="btn btn-default" name="formModif">commander</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Form -->
      <?php
        if (isset($_POST['formModif'])) {

          $email = $_GET['email'];
          $dureemassage = $_GET['duree'];
          $statut = 0;

          $ins = $dbc->prepare('INSERT INTO bon_cadeau (EMAIL_CLIENT, DESCRIPTION_BON_CADEAU, STATUT_BON_CADEAU) VALUES(?,?,?)');
          $ins -> execute(array($email, $dureemassage, $statut));

          $message = mail('elv-yann.vllrd@eduge.ch', 'Un nouveau bon cadeau a été commandé par :  '.$email, 'From: ' . $email);

        }
       ?>
    </div>
  </main>
  <?php include('../footer1.php') ?>
</body>
</html>
