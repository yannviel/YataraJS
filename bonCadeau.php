<?php
session_start();

include('BDD.php');

$soin = $dbc->query('SELECT * FROM massage WHERE ESTACTIF_MASSAGE = 1');
$typeSelect = null;


//$duree1h = '1h';
//$duree1h15 = '1h15';
//$duree1h30 = '1h30';

//$prix1 = '130 CHF';
//$prix2 = '160 CHF';
//$prix3 = '190 CHF';


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">
  <title>Accueil - Yatara massage</title>
</head>
<body>
  <?php include('nav.php'); ?>
  <link rel="stylesheet" href="CSS/boot1.css" />
  <link rel="stylesheet" href="CSS/form.css">
  <main>
    <?php if (!empty($_SESSION['PSEUDO_CLIENT'])) :?>
      <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form style="color: #757575;" action="#!" method="POST">

          <div class="container contact">
            <div class="row">
              <div class="col-md-3" class="text-center">
                <div class="contact-info">
                  <h2 class="text-center">Acheter un bon cadeau</h2>
                </div>
              </div>
              <div class="col-md-9">
                <div class="contact-form">
                  <div class="form-group">

                </div>

                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Durée du massage<span class="redstar">*</span></label>
                    <select name="dureeMassage" id="PrixDuree" class="form-control" >
                    </select>
                  </div>
                </div>
                <div class="form-group">










                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <?php if (isset($_POST['formModif'])): ?>

<a href="CRUD/commandeBonCadeau.php?duree=<?= $_POST['dureeMassage'] ?>&amp;email=<?= $_SESSION['EMAIL_CLIENT'] ?>" class="btn btn-default" style="background-color:#e2725b; Color:white; text-decoration:none;">commander</a>

                        <?php else: ?>


<a href="#" class="btn btn-default" style="background-color:#e2725b; Color:white; text-decoration:none;" >commander</a>


                      <?php endif; ?>





                    </form>

                  <?php   else :  ?>
                    <div class="card-body px-lg-5 pt-0">

                      <!-- Form -->
                      <form style="color: #757575;" action="#!" method="POST">

                        <div class="container contact">
                          <div class="row">
                            <div class="col-md-3" class="text-center">
                              <div class="contact-info">
                                <h2 class="text-center">Acheter un bon cadeau</h2>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="contact-form">
                                <div class="form-group">

                              </div>

                              <div class="form-group">
                                <div class="col-sm-10">
                                  <label for="nom">Durée du massage<span class="redstar">*</span></label>
                                    <select name="dureeMassage" id="PrixDuree" class="form-control" >
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">

                                <?php if (isset($erreur)) {
                                  echo '<font color="red">'.$erreur.'</font>';
                                }
                                elseif(isset($success)){
                                  echo '<font color="green">'.$success.'</font>';
                                }
                                ?>
                                <br>





                                <div class="col-md-9">
                                  <div class="contact-form">
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">
                                        <h3>Pour pouvoir commander il faut que vous soyez connecté !</h3>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">
                                        <a href="connexion.php" class="btn btn-default" style="background-color:#e2725b; Color:white; text-decoration:none;">Se connecter</a>
                                        <a href="register.php" class="btn btn-default" style="background-color:#e2725b; Color:white; text-decoration:none;">S'inscrire</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    <?php   endif;  ?>
                  </main>
                  <?php include('footer.php') ?>
                  <script src="JS/Boncadeau.js"></script>
                </body>
                </html>
