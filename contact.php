<?php
session_start();

include('BDD.php');

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">
  <!-- Title Page-->
  <title>Contact - Yatara massages</title>
  <link rel="icon" type="image/png" href="images/logo.bmp" />

</head>
<body>

  <link rel="stylesheet" href="CSS/form.css" />
  <?php include('nav.php')?>
  <link rel="stylesheet" href="CSS/boot1.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  <main >



    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

      <!-- Form -->
      <form style="color: #757575;" action="#!" method="POST">

      <div class="container contact">
        <div class="row">
          <div class="col-md-3">
            <div class="contact-info">
              <h2 class="text-center" >Me contacter</h2>
            </div>
          </div>
          <div class="col-md-9">
            <div class="contact-form">
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="message" id="messagey">Nom<span class="redstar">*</span></label>
                  <input type="text" class="form-control" id="fname" placeholder="Votre nom..." name="nom">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="message" id="messagey">Prénom<span class="redstar">*</span></label>
                  <input type="text" class="form-control" id="lname" placeholder="Votre prénom..." name="prenom">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="message" id="messagey">Adresse de messagerie<span class="redstar">*</span></label>
                  <input type="email" class="form-control" id="email" placeholder="Votre adresse email..." name="email">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="message" id="messagey">Votre message<span class="redstar">*</span></label>
                  <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default" name="formModif">Envoyer</button>
                </div>
              </div>
              <span class="redstar">*</span> Champs obligatoires
			  <?php

      			if (isset($_POST['formModif'])) {
        			$prenom = $_POST['prenom'];
       				$position_arobase = strpos($_POST['email'], '@');
        		if ($position_arobase === false)
        			echo '<p>Votre adresse email n\'est pas valide.</p>';
        		else {
          			$retour = mail('elv-yann.vllrd@eduge.ch', 'Yatara Massage Formulaire de contact :  '.$_POST['prenom'].' - '.$_POST['nom'], $_POST['message'], 'From: ' . $_POST['email']);
          		if($retour)
          			echo '<p>Votre message a été envoyé.</p>';
          		else
          		echo '<p>Erreur.</p>';
        			}
      			}
				?>
            </div>
          </div>
        </div>
      </div>
      <!-- Material form contact -->                
    </form>
    <!-- Form -->

  </div>

</main>
<?php include('footer.php') ?>
</body>
</html>
