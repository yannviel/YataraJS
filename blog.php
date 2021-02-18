<?php
session_start();

include('BDD.php');

$blog = $dbc->query('SELECT * FROM blog ORDER BY ID_BLOG DESC');

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">
  <title>Blog - Yatara massages</title>
</head>
<body>
  <?php include('nav.php'); ?>
  <link rel="stylesheet" href="CSS/boot1.css" />
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="CSS/card.css">
  <main style="height:90%">
    <div class="card-body px-lg-5 pt-0">
      <div class="container">
        <div class="row">
          <?php foreach ($blog as $blogSolo):

            if ($blogSolo['ESTACTIF_BLOG'] == 1) {
              ?>
            <div class="col-md-4">
              <div class="card-content">
                <div class="card-img" style="height:100%; width:100%">
                  <img src="images/<?php echo $blogSolo['IMAGE_BLOG'] ?>" alt=""  style="height:100%; width:100%">
                </div>
                <div class="card-desc" style="height: 270px;">
                  <h3><?php echo $blogSolo['TITRE_BLOG'] ?></h3>
                  <p><?php echo $blogSolo['DESCRIPTION_BLOG'] ?></p>
                    <a href="articleEntier.php?id=<?= $blogSolo['ID_BLOG'] ?>" class="btn-card" style="background-color: #e2725b;">Lire</a>

                  </div>
                </div>
              </div>
            <?php } endforeach ?>
          </div>
        </div>
      </div>
      <?php include('footer.php') ?>
    </main>
  </body>
  </html>
