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
  <title>Article - Yatara massages</title>
  <link rel="icon" type="image/png" href="../images/logo.bmp" />
</head>
<body>
  <?php include('nav.php'); ?>
  <link rel="stylesheet" href="CSS/boot1.css" />

  <main>

    <?php if (isset($_GET['id']) AND !empty($_GET['id'])):
      $get_id = htmlspecialchars($_GET['id']);

      $article = $dbc->prepare('SELECT * FROM blog WHERE ID_BLOG = ?');
      $article->execute(array($get_id));
      if ($article->rowCount() == 1) {
        $article = $article->fetch();
        $image = $article['IMAGE_BLOG'];
        $titre = $article['TITRE_BLOG'];
        $contenu = $article['DESCRIPTION_BLOG'];
      }
      ?>



      <!-- Card -->
      <div class="card card-cascade wider reverse" style="padding:9%; background-color: whitesmoke;">

        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img src="images/<?php echo $image ?>" class="d-block w-100" alt="..." style="max-height:650px;">
        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade text-center" style="background-color: white; margin-top: 0px;">

          <!-- Title -->
          <h4 class="card-title"><strong><?php echo $titre ?></strong></h4>
          <!-- Text -->
          <p class="card-text" ><?php echo $contenu ?>
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
    <?php endif; ?>
  </main>
  <?php include('footer.php') ?>
</body>
</html>
