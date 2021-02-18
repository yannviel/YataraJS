<?php
session_start();

include('BDD.php');

$produit = $dbc->query('SELECT * FROM produit ORDER BY ID_PRODUIT DESC');

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
          <?php foreach ($produit as $produitSolo):

            if ($produitSolo['ESTACTIF_PRODUIT'] == 1) {
              ?>
            <div class="col-md-4">
              <div class="card-content">
                <div class="card-img">
                  <img src="images/<?php echo $produitSolo['IMAGE_PRODUIT'] ?>" alt="">
                </div>
                <div class="card-desc" style="height: 270px;">
                  <h3><?php echo $produitSolo['NOM_PRODUIT'] ?></h3>
                  <p><?php echo $produitSolo['DESCRIPTION_PRODUIT'] ?></p>
                  <a href="produitEntier.php?id=<?= $produitSolo['ID_PRODUIT'] ?>" class="btn-card" style="background-color: #e2725b;">voir plus</a>
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
