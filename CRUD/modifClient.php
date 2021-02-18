<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

$soin = $dbc->query('SELECT * FROM client WHERE ESTACTIF_CLIENT = 1');
$typeSelect = null;

if (isset($_POST['ok']) || isset($_POST['formModif']) ) {
  $email = htmlspecialchars($_POST['email']);
  $emailClient = htmlspecialchars($_POST['emailClient']);
  $tel = htmlspecialchars($_POST['tel']);
  $pseudo = htmlspecialchars($_POST['pseudo']);
  if (isset($_POST['ok'])){
    $email = htmlspecialchars($_POST['email']);
    $reqtype2 = $dbc->prepare("SELECT * FROM client WHERE EMAIL_CLIENT = :email");
    $reqtype2->bindParam(':email', $email, PDO::PARAM_STR);
    $reqtype2->execute();
    $typeSelect = $reqtype2->fetch();
  }

  if (isset($_POST['formModif'])) {
    $emailClient = htmlspecialchars($_POST['emailClient']);
    $tel = htmlspecialchars($_POST['tel']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $reqtype2 = $dbc->prepare("SELECT * FROM client WHERE EMAIL_CLIENT = :emailClient");
    $reqtype2->bindParam(':emailClient', $email, PDO::PARAM_STR);
    $reqtype2->execute();
    $typeSelec = $reqtype2->fetch();
    $IDmodif = $typeSelec['ID_CLIENT'];

    if (!empty($_POST['emailClient'])) {
      $reqModif = $dbc->prepare("UPDATE client SET EMAIL_CLIENT = :email WHERE ID_CLIENT = :idclient");
      $reqModif2 = $dbc->prepare("UPDATE client SET TELEPHONE_CLIENT = :tel WHERE ID_CLIENT = :idclient");
      $reqModif3 = $dbc->prepare("UPDATE client SET PSEUDO_CLIENT = :pseudo WHERE ID_CLIENT = :idclient");
      $reqModif->bindParam(':email', $emailClient, PDO::PARAM_STR);
      $reqModif2->bindParam(':tel', $tel, PDO::PARAM_STR);
      $reqModif3->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
      $reqModif->bindParam(':idclient', $IDmodif, PDO::PARAM_STR);
      $reqModif2->bindParam(':idclient', $IDmodif, PDO::PARAM_STR);
      $reqModif3->bindParam(':idclient', $IDmodif, PDO::PARAM_STR);
      $reqModif->execute();
      $reqModif2->execute();
      $reqModif3->execute();
      $success = "La modification a été effectué avec succès ! ";
    }
    else {
      $erreur = "Le champs doit être rempli.";
    }
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
                    <label for="nom">Choix du client</label>
                    <select name="email" class="form-control" placeholder="Choisissez un type de compte">
                      <optgroup label="Nom massage">
                        <?php
                        foreach ($soin as $soinsolo ):
                          if ($typeSelect['ID_CLIENT'] == $soinsolo['ID_CLIENT']) {
                            echo '<option value="'.$soinsolo['EMAIL_CLIENT'].'" selected>'.$soinsolo['EMAIL_CLIENT'].'</value>';
                          } else {
                            echo '<option value="'.$soinsolo['EMAIL_CLIENT'].'">'.$soinsolo['EMAIL_CLIENT'].'</value>';
                          }
                        endforeach;
                        ?>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button name="ok" class="btn btn-default"><span>ok</span></button>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Modifier l'email du client</label>
                    <input type="text" class="form-control" id="fname" name="emailClient" value="<?php if (isset($_POST['ok'])){echo $typeSelect['EMAIL_CLIENT'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Modifier le numéro de téléphone</label>
                    <input type="text" class="form-control" id="fname" name="tel"  value="<?php if (isset($_POST['ok'])){echo $typeSelect['TELEPHONE_CLIENT'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Modifier le nom d'utilisateur</label>
                    <input type="text" class="form-control" id="fname" name="pseudo" value="<?php if (isset($_POST['ok'])){echo $typeSelect['PSEUDO_CLIENT'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button style="width: 90px;" type="submit" class="btn btn-default" name="formModif">Valider</button>
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
