<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');
$soin = $dbc->query('SELECT * FROM massage WHERE ESTACTIF_MASSAGE = 1');
$client = $dbc->query('SELECT * FROM client WHERE ESTACTIF_CLIENT = 1');

function Fractionner($StartTime="08:00:00", $EndTime="18:00:00", $Duration="60"){

  $ReturnArray = array ();
  $StartTime    = strtotime ($StartTime); // Timestamp
  $EndTime      = strtotime ($EndTime); // Timestamp

  $AddMins  = $Duration * 60;

  while ($StartTime <= $EndTime)
  {
    $ReturnArray[] = date ("G:i", $StartTime);
    $StartTime += $AddMins;
  }
  return $ReturnArray;
}

if (isset($_POST['btnrdv'])) {
  if (!empty($_POST['heure'])) {
      $masssagechoix = $_POST['choixmassage'];
      $clientRes = htmlspecialchars($_POST['client']);

      $reqid2 = $dbc->prepare('SELECT * FROM massage WHERE TYPE_MASSAGE = :nomMassage');
      $reqid2->bindParam(':nomMassage', $masssagechoix, PDO::PARAM_STR);
      $reqid2->execute();
      $idSelec = $reqid2->fetch();

      $reqid3 = $dbc->prepare('SELECT * FROM client WHERE EMAIL_CLIENT = :email');
      $reqid3->bindParam(':email', $clientRes, PDO::PARAM_STR);
      $reqid3->execute();
      $idSelec3 = $reqid3->fetch();

      $dateRdv = htmlspecialchars($_POST['datechoisi']);
      $heureRdv = htmlspecialchars($_POST['heure']);
      $duree = htmlspecialchars($_POST['duree']);
      $paiement = "Cash";
      $estActifRes = 1;
      $statut = "Payé";
      $bon = 0;

      $ins = $dbc->prepare('INSERT INTO reservation (ID_MASSAGE,ID_BON_CADEAU, ID_CLIENT,DATE_RDV_RESERVATION,DUREE_RESERVATION,HEURE_RDV_RESERVATION, DATE_RESERVATION, METHODE_PAIEMENT_RESERVATION,STATUT_PAIEMENT,ESTACTIF_RESERVATION) VALUES(?,?,?,?,?,?,now(),?,?,?)');
      $ins -> execute(array($idSelec['ID_MASSAGE'],$bon,$idSelec3['ID_CLIENT'],$dateRdv,$duree,$heureRdv,$paiement,$statut,$estActifRes));

      $success = 'Votre réservation est ajoutée !';
  }
  else {

    $erreur = 'Choisissez la date et appuyez sur "OK" !';
  }
}


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
  <?php include('../nav1.php');  ?>
  <link rel="stylesheet" href="../CSS/boot1.css" />
  <link rel="stylesheet" href="../CSS/form.css" />

  <main>
    <?php if (!empty($_SESSION['PSEUDO_CLIENT']) OR !empty($_SESSION['PSEUDO_EMPLOYE'])) :?>
      <!--Card content-->
      <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form style="color: #757575;" action="ajoutReservation.php" method="POST">

          <div class="container contact">
            <div class="row">
              <div class="col-md-3 text-center">
                <div class="contact-info" class="text-center">
                  <h2 class="text-center">Ajout d'une réservation</h2>
                  <a href="../admin/admin.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Retour</a><br>
                </div>
              </div>
              <div class="col-md-9">
                <div class="contact-form">
                  <div class="form-group">
                    <?php if (isset($erreur)) {
                      echo '<font color="red">'.$erreur.'</font>';
                    }
                    elseif(isset($success)){
                      echo '<font color="green">'.$success.'</font>';
                    }
                    ?>
                    <div class="col-sm-10">
                      <label for="nom">Choix du client</label>
                      <select name="client" class="form-control" placeholder="Choisissez un type de compte">
                        <optgroup label="Nom massage">
                          <?php
                          foreach ($client as $infoclient ):
                            echo '<option value="'.$infoclient['EMAIL_CLIENT'].'">'.$infoclient['EMAIL_CLIENT'].'</value>';
                          endforeach;
                          ?>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <label for="message" id="messagey">Choix du massage<span class="redstar">*</span></label>
                      <select name="choixmassage" class="form-control">
                        <optgroup label="Choix du massage">
                          <?php foreach ($soin as $soinsolo ):    ?>
                            <?php if (isset($_POST['oki'])) :
                              if ($_POST['choixmassage'] == $soinsolo['TYPE_MASSAGE']):?>
                              <option value="<?=$soinsolo['TYPE_MASSAGE']?>"selected ><?= $soinsolo['TYPE_MASSAGE']?></option>
                            <?php else: ?>
                              <option value="<?=$soinsolo['TYPE_MASSAGE']?>"><?= $soinsolo['TYPE_MASSAGE']?></option>


                            <?php endif;?>

                          <?php else: ?>
                            <option value="<?=$soinsolo['TYPE_MASSAGE']?>"><?= $soinsolo['TYPE_MASSAGE']?></option>

                          <?php endif; ?>
                        <?php    endforeach;?>

                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="message" id="messagey">Choix de la durée<span class="redstar">*</span></label>
                    <select name="duree" class="form-control">
                      <optgroup label="Choix de la durée">

                        <?php if (isset($_POST['oki'])) :?>
                          <option value="1h" <?php if ($_POST['duree'] == "1h") :?> selected <?php endif; ?>>1h</option>
                          <option value="1h15" <?php if ($_POST['duree'] == "1h15") :?> selected <?php endif; ?>>1h15</option>
                          <option value="1h30" <?php if ($_POST['duree'] == "1h30") :?> selected <?php endif; ?>>1h30</option>

                        <?php else: ?>
                          <option value="1h">1h</option>
                          <option value="1h15">1h15</option>
                          <option value="1h30">1h30</option>
                        <?php endif; ?>
                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="message" id="messagey">Choix de la date<span class="redstar">*</span></label>
                    <input type="date" name="datechoisi" value="<?php if (isset($_POST['oki'])) {echo $_POST['datechoisi']; }?>" class="form-control"><br>
                    <button type="submit" class="btn btn-default" name="oki">Ok</button>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="message" id="messagey">Choix de l'heure<span class="redstar">*</span></label>
                    <select name="heure" class="form-control">
                      <optgroup label="Choix de l'heure">
                        <?php if (isset($_POST['oki'])): ?>
                          <?php
                          $date = htmlspecialchars($_POST['datechoisi']);
                          ?>
                          <?php foreach (Fractionner() as $heure):


                            $reqtype2 = $dbc->prepare("SELECT * FROM reservation WHERE DATE_RDV_RESERVATION = ? AND HEURE_RDV_RESERVATION = ?");
                            $reqtype2->execute(array($date, $heure));
                            $heureExist = $reqtype2->rowCount(); ?>


                            <?php if ($heureExist == 0): ?>
                              <option value="<?= $heure ?>"><?= $heure ?></option>
                            <?php else: ?>

                            <?php endif;
                            $heureExist = null; ?>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="btnrdv" style="width: 190px;">Ajouter une réservation</button>
                  </div>
                </div>
                <span class="redstar">*</span> Champs obligatoire

              </div>

            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php   else :  ?>
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form style="color: #757575;" action="#!" method="POST">

      <div class="container contact">
        <div class="row">

          <div class="col-md-3">
            <div class="contact-info">
              <h2 class="text-center" >Prendre rendez-vous</h2>
            </div>
          </div>
          <div class="col-md-9">
            <div class="contact-form">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <h3>Pour pouvoir réserver il faut que vous soyez connecté !</h3>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <a href="connexion.php" class="btn btn-default" style="background-color:#e2725b; Color:white; text-decoration:none;">Se connecter</a>
                  <a href="register.php" class="btn btn-default" style="background-color:#e2725b; Color:white; text-decoration:none;">S'inscrire</a>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="message" id="messagey">Choix massage<span class="redstar">*</span></label>
                  <select name="choixmassage" class="form-control">
                    <optgroup label="Choix du massage">
                      <?php
                      foreach ($soin as $soinsolo ):
                        echo '<option value="'.$soinsolo['TYPE_MASSAGE'].'" selected>'.$soinsolo['TYPE_MASSAGE'].'</value>';
                      endforeach;
                      ?>
                    </optgroup>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="message" id="messagey">Choix de la durée<span class="redstar">*</span></label>
                  <select name="duree" class="form-control">
                    <optgroup label="Choix de la durée">
                      <option value="null" disabled selected hidden>Choisissez la durée...</option>
                      <option value="1h">1h</option>
                      <option value="1h15">1h15</option>
                      <option value="1h30">1h30</option>
                    </optgroup>
                  </select>
                </div>
              </div>
              <form method="post">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="message" id="messagey">Choix de la date<span class="redstar">*</span></label>
                    <input type="date" name="datechoisi" value="<?php if (isset($_POST['oki'])) {echo $_POST['datechoisi']; }?>" class="form-control"><br>
                    <button type="submit" class="btn btn-default" name="oki">Ok</button>
                  </div>
                </div>
              </form>
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="message" id="messagey">Choix de l'heure<span class="redstar">*</span></label>
                  <select name="heure" class="form-control">
                    <optgroup label="Choix de l'heure">
                      <?php if (isset($_POST['oki'])): ?>
                        <?php
                        $date = htmlspecialchars($_POST['datechoisi']);
                        ?>
                        <?php foreach (Fractionner() as $heure):


                          $reqtype2 = $dbc->prepare("SELECT * FROM reservation WHERE DATE_RDV_RESERVATION = ? AND HEURE_RDV_RESERVATION = ?");
                          $reqtype2->execute(array($date, $heure));
                          $heureExist = $reqtype2->rowCount(); ?>


                          <?php if ($heureExist == 0): ?>
                            <option value="<?= $heure ?>"><?= $heure ?></option>
                          <?php else: ?>

                          <?php endif;
                          $heureExist = null; ?>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <option value="" disabled selected hidden>Choisissez l'heure...</option>
                      <?php endif; ?>
                    </optgroup>
                  </select>
                </div>
              </div>
              <?php if (isset($erreur)) {
                echo '<font color="red">'.$erreur.'</font>';
              }
              elseif(isset($success)){
                echo '<font color="green">'.$success.'</font>';
              }
              ?>
              <span class="redstar">*</span> Champs obligatoire
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php   endif;  ?>
</form>

</div>

</main>
<?php include('../footer1.php') ?>
</body>
</html>
<?php }
else {
  echo "<html>
                <head>
                <body onload=\"javascript:alert('Connectez-vous avec un compte administrateur');window.location='../index.php'\">
                </body>
                </head>";
              }
   ?>
