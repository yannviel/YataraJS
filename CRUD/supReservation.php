<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

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

if (isset($_POST['formModif'])) {
  if (!empty($_POST['heure'])) {
    $vdate = htmlspecialchars($_POST['datechoisi']);
    $vheure = htmlspecialchars($_POST['heure']);



    $reqtype2 = $dbc->prepare("SELECT * FROM reservation WHERE DATE_RDV_RESERVATION = :dateRdv AND HEURE_RDV_RESERVATION = :heureRDV");
    $reqtype2->bindParam(':dateRdv', $vdate, PDO::PARAM_STR);
    $reqtype2->bindParam(':heureRDV', $vheure, PDO::PARAM_STR);
    $reqtype2->execute();
    $typeSelec = $reqtype2->fetch();
    $IDmodif = $typeSelec['ID_RESERVATION'];

    $reqDate = $dbc->prepare("SELECT * FROM reservation WHERE DATE_RDV_RESERVATION = ? AND HEURE_RDV_RESERVATION = ?");
    $reqDate->execute(array($vdate, $vheure));
    $dateexist = $reqDate->rowCount();

	$reqModif = $dbc->prepare("DELETE FROM reservation WHERE ID_RESERVATION = :idRes");
      $reqModif->bindParam(':idRes', $IDmodif, PDO::PARAM_STR);
      $reqModif->execute();


      $success = "La modification a été effectué avec succès !";

  }
  else {
    $erreur = "Choisissez une date et appuyez sur ok !";
  }
}
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
  <title>Modifier un client  - Yatara massages</title>

</head>
<body>

  <?php include('../nav1.php') ?>
  <link rel="stylesheet" href="../CSS/form.css" />
  <link rel="stylesheet" href="../CSS/boot1.css" />
  <main>
    <div class="card-body px-lg-5 pt-0">

      <!-- Form -->
      <form style="color: #757575;" action="#!" method="POST">

        <div class="container contact">
          <div class="row">
            <div class="col-md-3 text-center">
              <div class="contact-info" class="text-center">
                <h2 class="text-center">Modifier un client</h2>
                <a href="../admin/admin.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Retour</a><br>
              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Choix de la date</label>
                    <input type="date" name="datechoisi" value="<?php if (isset($_POST['oki'])) {echo $_POST['datechoisi']; }?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button name="oki" class="btn btn-default"><span>ok</span></button>
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


                            $reqtype2 = $dbc->prepare("SELECT * FROM reservation WHERE DATE_RDV_RESERVATION = ? AND HEURE_RDV_RESERVATION = ? AND ESTACTIF_RESERVATION = 1");
                            $reqtype2->execute(array($date, $heure));
                            $heureExist = $reqtype2->rowCount(); ?>

                            <?php if ($heureExist == 1): ?>
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
                    <button style="width: 100px;" type="submit" class="btn btn-default" name="formModif">Supprimer</button>
                  </div>
                  <?php if (isset($erreur)) {
                    echo '<font color="red">'.$erreur.'</font>';
                  }
                  elseif(isset($success)){
                    echo '<font color="green">'.$success.'</font>';
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- Form -->

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

