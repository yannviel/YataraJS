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
  <title>Accueil - Yatara massages</title>
  <link rel="icon" type="image/png" href="../images/logo.bmp" />
</head>
<body>
  <?php include('nav.php'); ?>
  <link rel="stylesheet" href="CSS/form.css" />
  <link rel="stylesheet" href="CSS/boot1.css" />

  <main>
    <!-- Card -->
    <div class="card card-cascade wider reverse" style="padding:9%; background-color: whitesmoke; ">

      <!-- Card image -->
      <div class="view view-cascade overlay" style="background-color: #dbdbdb; border-bottom: solid 0.1px lightgray;">
        <img src="images/CarinePortrait.png" alt="" style="max-width: 85%;">
      </div>

      <!-- Card content -->
      <div class="card-body card-body-cascade text-center" style="background-color: white; margin-top: 0px;">

        <!-- Title -->
        <h2 class="card-title"><strong>Carine Torrent</strong></h2>
        <h4 class="card-title" style="background-color: #e2725b; margin-left:31%; margin-right:31%; border-radius: 20px; color: white; font-size: 120%;"><strong>Masseuse</strong></h4>
        <!-- Text -->
        <p class="card-text" >
          Après avoir travaillé plusieurs années dans le secteur bancaire, j'ai eu envie de prendre un autre chemin, qui m'apporte davantage de satisfaction personnelle, dans un cadre plus humain. Une activité qui me permette de prendre soin des autres. Aider son prochain est la plus belle des aptitudes et, en devenant masseuse, je pouvais réaliser cela plus que jamais auparavant. 
          J'aime faire du bien et prendre soin des gens. J'aime cette bulle hors du temps créée lors des séances de massages. J'aime être à l'écoute des autres et les recevoir en toute simplicité.
          Je le fais avec bonheur depuis quinze ans.
          Plus parlants que mes propres mots, je vous propose de lire quelques-uns des témoignages ci-dessous. Laissez-vous inspirer, je serai ravie de prendre soin de vous !
        </p>

        <!-- Linkedin -->
        <a class="px-2 fa-lg li-ic"><i class="fab fa-linkedin-in"></i></a>
        <!-- Twitter -->
        <a class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
        <!-- Dribbble -->
        <a class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a>

      </div>

    </div>
    <!-- Card -->
  </main>
  <?php include('footer.php') ?>
</body>
</html>
