<?php
session_start();

include('BDD.php');


$soins = $dbc->query('SELECT * FROM massage WHERE ESTACTIF_MASSAGE = 1');




?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">
  <title>Mes soins - Yatara massages</title>
</head>
<body>
  <style media="screen">
  @font-face {
    font-family: "ZCOOLXiaoWei-Regular";
    src: url("../Police/ZCOOLXiaoWei-Regular.ttf");
  }

  *{
    font-family: "ZCOOLXiaoWei-Regular", serif;
  }

  .btn-link:focus{
    text-decoration: none !important;
  }

  </style>
  <?php include('nav.php'); ?>
  <link rel="stylesheet" href="CSS/boot1.css" />
  <link rel="stylesheet" href="CSS/form.css" />
  <main>

    <div id="accordion" style="padding: 9%;">
      <?php $cpt = 0;?>
      <?php foreach ($soins as $soinsolo):?>

        <div class="card">

          <div class="card-header" id="headingOne"  style="text-align: center;  background-color: #e2725b;">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?=$cpt ?>" aria-expanded="false" aria-controls="collapse<?=$cpt ?>" style=" font-size: 100%; color: white; text-decoration: none;">
                <?php echo $soinsolo['TYPE_MASSAGE']; ?>
              </button>
            </h5>
          </div>
          <div id="collapse<?=$cpt ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body" style="text-align: center; padding: 3%;">
              <?php echo $soinsolo['DESCRIPTION_MASSAGE']; ?>
            </div>
          </div>
        </div>

        <?php
        $cpt += 1;
      endforeach; ?>

    </div>

  </main>
  <?php include('footer.php') ?>
</body>
</html>
