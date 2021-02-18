<?php
session_start();
include('BDD.php');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">
  <title>Accueil - Yatara Massages</title>
  <link rel="icon" type="image/png" href="images/logo.bmp" />
</head>
<body>
  <?php include('nav.php'); ?>
  <link rel="stylesheet" href="CSS/form.css" />
  <link rel="stylesheet" href="CSS/boot1.css" />

  <main>
    <!-- Card -->
    <div class="card card-cascade wider reverse" style="margin:14%; background-color: whitesmoke;">

      <!-- Card content -->
      <div class="card-body card-body-cascade text-center" style="background-color: white; margin-top: 0px;">

        <!-- Title -->
        <h4 class="card-title"><strong>Présentation de mon salon</strong></h4>
        <!-- Text -->
        <p class="card-text" >YATARA, ce joli mot signifie voyage en pendjabi, langue parlée au Nord de l'Inde.
          Lorsque vous bénéficiez d'un massage, vous libérez vos pensées, vous vous relaxez, vous vous évadez. Vous êtes ici... mais aussi un peu ailleurs.
          Le massage est bien plus qu'un soin du corps. Il aide bien sûr à dénouer les tensions, à faire circuler l'énergie, à rééquilibrer.
          Ayant recouvré votre énergie, vous en ressortez avec un souffle nouveau et un dynamisme retrouvé. Un massage permet de vous déconnecter des problèmes du quotidien, de libérer votre esprit, simplement par le fait d'avoir moins d'attention sur le corps. Vous gagnez en tonus, votre fatigue est pour ainsi dire recyclée.
          Tout un voyage intérieur. YATARA. Prêt-e-s à faire le voyage ?
          <br><a style="color:#e2725b; font-weight: bold" href="prendreRDV.php">Je prends rendez-vous.</a>
        </p>

        <!-- Linkedin -->
        <a class="px-2 fa-lg li-ic"><i class="fab fa-linkedin-in"></i></a>
        <!-- Twitter -->
        <a class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
        <!-- Dribbble -->
        <a class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a>

      </div>

      <!-- Card image -->
      <div class="view view-cascade overlay">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	<li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
	<li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/salonn.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Salon Yatara massages</h5>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/salonn2.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Salon Yatara massages</h5>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/salonn3.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Salon Yatara massages</h5>
        <p></p>
      </div>
    </div>
	<div class="carousel-item">
      <img src="images/salonn4.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Salon Yatara massages</h5>
        <p></p>
      </div>
    </div>
	<div class="carousel-item">
      <img src="images/salonn5.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Salon Yatara massages</h5>
        <p></p>
      </div>
    </div>
	<div class="carousel-item">
      <img src="images/salonn6.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Salon Yatara massages</h5>
        <p></p>
      </div>
    </div>
	<div class="carousel-item">
      <img src="images/salonn7.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Salon Yatara massages</h5>
        <p></p>
      </div>
    </div>
	<div class="carousel-item">
      <img src="images/salonn8.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Salon Yatara massages</h5>
        <p></p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
    </div>
    <!-- Card -->
  </main>
  <?php include('footer.php') ?>
</body>
</html>
