<?php
session_start();

include('BDD.php');
$soin = $dbc->query('SELECT * FROM massage WHERE ESTACTIF_MASSAGE = 1');

$date = date('Y-m-d');

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
    if (!empty($_POST['meth'])) {
      $masssagechoix = $_POST['choixmassage'];

      $reqid2 = $dbc->prepare('SELECT * FROM massage WHERE TYPE_MASSAGE = :nomMassage');
      $reqid2->bindParam(':nomMassage', $masssagechoix, PDO::PARAM_STR);
      $reqid2->execute();
      $idSelec = $reqid2->fetch();


      $dateRdv = htmlspecialchars($_POST['datechoisi']);
      $heureRdv = htmlspecialchars($_POST['heure']);
      $clientRes = htmlspecialchars($_SESSION['ID_CLIENT']);
      $duree = htmlspecialchars($_POST['duree']);
      $paiement = htmlspecialchars($_POST['meth']);
      $estActifRes = 1;

      if (empty($_POST['bon'])) {
        $statut = "En attente";
        $bon = 0;

        $ins = $dbc->prepare('INSERT INTO reservation (ID_MASSAGE,ID_BON_CADEAU, ID_CLIENT,DATE_RDV_RESERVATION,DUREE_RESERVATION,HEURE_RDV_RESERVATION, DATE_RESERVATION, METHODE_PAIEMENT_RESERVATION,STATUT_PAIEMENT,ESTACTIF_RESERVATION) VALUES(?,?,?,?,?,?,now(),?,?,?)');
        $ins -> execute(array($idSelec['ID_MASSAGE'],$bon,$clientRes,$dateRdv,$duree,$heureRdv,$paiement,$statut,$estActifRes));
        mail($_SESSION['EMAIL_CLIENT'],"Merci pour votre réservation !" ,"Merci ! Votre réservation a bien été enregistré ! Si vous souhaitez annuler il est impératif de le faire 24 heures avant l'heure du rendez-vous.", 'From: carine.torrent@gmail.com');
        header("Location: CRUD/recapRdv.php?duree=".$_POST['duree']."&email=".$_SESSION['EMAIL_CLIENT']."&massage=".$_POST['choixmassage']."&date=".$_POST['datechoisi']."&heure=".$_POST['heure']."&meth=".$_POST['meth']);

        $success = 'Votre réservation est enregistrée !';
      }
      else {
        $bon = htmlspecialchars($_POST['bon']);


        $reqbon = $dbc->prepare("SELECT * FROM bon_cadeau WHERE CODE_BON_CADEAU = ? AND STATUT_BON_CADEAU = 1");
        $reqbon->execute(array($bon));
        $bonexist = $reqbon->rowCount();

        $reqbon2 = $dbc->prepare('SELECT * FROM bon_cadeau WHERE CODE_BON_CADEAU = :bon');
        $reqbon2->bindParam(':bon', $bon, PDO::PARAM_STR);
        $reqbon2->execute();
        $idSelecBon = $reqbon2->fetch();

        if ($bonexist > 0) {
          $statut = "Paye avec bon cadeau";

          $ins = $dbc->prepare('INSERT INTO reservation (ID_MASSAGE, ID_BON_CADEAU, ID_CLIENT,DATE_RDV_RESERVATION,DUREE_RESERVATION,HEURE_RDV_RESERVATION, DATE_RESERVATION, METHODE_PAIEMENT_RESERVATION,STATUT_PAIEMENT,ESTACTIF_RESERVATION) VALUES(?,?,?,?,?,?,now(),?,?,?)');
          $ins -> execute(array($idSelec['ID_MASSAGE'],$idSelecBon['ID_BON_CADEAU'],$clientRes,$dateRdv,$duree,$heureRdv,$paiement,$statut,$estActifRes));
          mail($_SESSION['EMAIL_CLIENT'],"Merci pour votre réservation !" ,"Merci ! Votre réservation a bien été enregistré ! Si vous souhaitez annuler il est impératif de le faire 24 heures avant l'heure du rendez-vous.", 'From: carine.torrent@gmail.com');
          header("Location: CRUD/recapRdv.php?duree=".$_POST['duree']."&email=".$_SESSION['EMAIL_CLIENT']."&massage=".$_POST['choixmassage']."&date=".$_POST['datechoisi']."&heure=".$_POST['heure']."&meth=".$_POST['meth']);

          $success = 'Votre réservation est enregistrée !';
        }

        else {
          $erreur = "Ce bon n'existe pas";
        }
      }
    }

    else {
      $erreur = 'Choisissez la méthode de paiement !';
    }
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
  <?php include('nav.php');  ?>
  <link rel="stylesheet" href="CSS/boot1.css" />
  <link rel="stylesheet" href="CSS/form.css" />

  <main>
    <?php if (!empty($_SESSION['PSEUDO_CLIENT']) OR !empty($_SESSION['PSEUDO_EMPLOYE'])) :?>
      <!--Card content-->
      <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form style="color: #757575;" action="prendreRDV.php" method="POST">

          <div class="container contact">
            <div class="row">
              <div class="col-md-3">
                <div class="contact-info">
                  <h2 class="text-center" >Prendre <br>rendez-vous</h2>
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
                      <label for="bon">Bon cadeau (Si vous n'avez pas de bon cadeau, appuyez sur confirmer avec le champ vide)</label>
                      <input type="text" class="form-control" id="fname" placeholder="Entrez votre bon cadeau..." name="bon" value="<?php if(isset($_POST['bon'])) {echo $_POST['bon']; } ?>"><br>
                      <button type="submit" class="btn btn-default" name="oki2"  style="width: 110px;">Confirmer</button>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-10">
                      <?php if (isset($_POST['oki2']) OR isset($_POST['oki'])): ?>


                        <?php
                        $bon = htmlspecialchars($_POST['bon']);

                        $reqbon = $dbc->prepare("SELECT * FROM bon_cadeau WHERE CODE_BON_CADEAU = ? AND STATUT_BON_CADEAU = 1");
                        $reqbon->execute(array($bon));
                        $bonexist = $reqbon->rowCount();
                        if (!empty($bon)) :
                          if ($bonexist > 0) :
                            $reqbon2 = $dbc->prepare('SELECT * FROM bon_cadeau WHERE CODE_BON_CADEAU = :bon');
                            $reqbon2->bindParam(':bon', $bon, PDO::PARAM_STR);
                            $reqbon2->execute();
                            $idSelecBon = $reqbon2->fetch();
                            ?>

                            <label for="message" id="messagey">Choix de la durée<span class="redstar">*</span></label>
                            <input type="text" name="duree" value="<?php echo $idSelecBon['DESCRIPTION_BON_CADEAU'] ?>" class="form-control" readonly="true">
                            <?php
                            else :

                              $erreur = "Ce bon n'existe pas ";
                              echo '<font color="red">'.$erreur.'</font>';

                            endif;
                            else : ?>
                            <label for="message" id="messagey">Choix de la durée<span class="redstar">*</span></label>
                            <select name="duree" class="form-control">
                              <optgroup label="Choix de la durée">

                                <?php if (isset($_POST['oki'])) :?>
                                  <option value="1h" <?php if ($_POST['duree'] == "1h") :?> selected <?php endif; ?>>1h (130 CHF)</option>
                                  <option value="1h15" <?php if ($_POST['duree'] == "1h15") :?> selected <?php endif; ?>>1h15 (160 CHF)</option>
                                  <option value="1h30" <?php if ($_POST['duree'] == "1h30") :?> selected <?php endif; ?>>1h30 (190 CHF)</option>

                                <?php else: ?>
                                  <option value="1h">1h (130 CHF)</option>
                                  <option value="1h15">1h15 (160 CHF)</option>
                                  <option value="1h30">1h30 (190 CHF)</option>
                                <?php endif; ?>
                              </optgroup>
                            </select>
                            <?php
                          endif;
                        endif; ?>
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
                      <label for="message" id="messagey">Choix de la date<span class="redstar">*</span></label>
                      <input min="<?php echo $date; ?>" type="date" name="datechoisi" value="<?php if (isset($_POST['oki'])) {echo $_POST['datechoisi']; } else {echo $date; }?>" class="form-control"><br>
                      <button type="submit" class="btn btn-default" name="oki" style="width: 110px;">Confirmer</button>
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

                  <?php if (isset($_POST['oki2']) OR isset($_POST['oki'])):
                    $bon = htmlspecialchars($_POST['bon']);?>
                    <?php if (empty($bon)): ?>
                      <div class="form-group" style="width: 100%;">
                        <div class="col-sm-10">
                          <label for="">Choisissez votre méthode de paiement :<span class="redstar">*</span></label><br><br>
                          <input type="radio" name="meth" value="Cash" style="width: 10%;">
                          <label for="meth" id="lblc" style="padding-right:50px;">Cash</label>
                          <input type="radio" name="meth" value="TWINT" style="width: 10%;">
                          <label for="meth" id="lblt">TWINT</label>
                        </div>
                      </div>
                    <?php else: ?>
                      <div class="form-group" style="width: 100%;">
                        <div class="col-sm-10">
                          <label for="">Méthode de paiement :<span class="redstar">*</span></label><br><br>
                          <input type="radio" id="bc" name="meth" value="Bon cadeau" style="width: 10%;" checked>
                          <label for="meth" id="lblbc" value="Bon Cadeau">Bon cadeau</label>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" name="btnrdv" style="width: 190px;">Prendre rendez-vous</button>
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
                        <option value="1h">1h (130 CHF)</option>
                        <option value="1h15">1h15 (160 CHF)</option>
                        <option value="1h30">1h30 (190 CHF)</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <form method="post">
                  <div class="form-group">
                    <div class="col-sm-10">
                      <label for="message" id="messagey">Choix de la date<span class="redstar">*</span></label>
                      <input min="<?php echo $date; ?>" type="date" name="datechoisi" value="<?php if (isset($_POST['oki'])) {echo $_POST['datechoisi']; }else {echo $date; }?>" class="form-control" ><br>
                      <button type="submit" class="btn btn-default" name="oki" style="width: 110px;">Ok</button>
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
<?php include('footer.php') ?>
</body>
</html>
