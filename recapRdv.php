<?php
include('../BDD.php');

session_start();
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
  <title>Rendez-vous effectué - Yatara massages </title>

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
                <h2 class="text-center">Merci d'avoir réservé !</h2>
              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <h4>Récapitulatif du rendez vous :</h4>

                  <?php
                  echo "email  : ".$_GET['email'];
                  echo "<br>";
				  echo "Date  : " '<span id="recapDate">'.$_GET['date'].'</span>'; 
	              echo "<br>";
                  echo "Heure  : " .$_GET['heure']; 
				  echo "<br>";
                  echo "Massage choisi  : ".$_GET['massage'];
                  echo "<br>";
                  echo "durée du massage : ".$_GET['duree'];
                  echo "<br>";
                  echo "Méthode de paiement : ".$_GET['meth'];
                  echo "<br>";
                  echo "prix total : ";
                  if ($_GET['duree'] == "1h"){
                    echo $prix1;
                  } elseif ($_GET['duree']== "1h15" ){
                    echo $prix2;
                  } elseif ($_GET['duree'] == "1h30" ){
                    echo $prix3;
                  }
                  ?>
                  <?php if ($_GET['meth'] == "Cash"): ?>
                    <br> <p>Votre paiement sera attendu sur place à l'heure du rendez-vous, vous pouvez annulé au maximum 24h avant l'heure du rendez-vous !</p>
                  <?php elseif ($_GET['meth'] == "TWINT") : ?>
                    <br> <p>Pour votre paiement avec TWINT veuillez payé au 078 907 08 28, si le paiement n'est pas effectué 24h avant le rendez-vous il sera annulé !</p>
                  <?php else :?>
                    <br> <p>Vous pouvez annulé votrre rendez-vous 24h avant l'heure de celui-ci !</p>
                  <?php endif; ?>



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
