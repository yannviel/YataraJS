<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

$soin = $dbc->query('SELECT * FROM massage WHERE ESTACTIF_MASSAGE = 1');

if (isset($_POST['formModif'])) {
  $type = htmlspecialchars($_POST['typeMassage']);

  $reqtype = $dbc->prepare("SELECT * FROM massage WHERE TYPE_MASSAGE = ?");
  $reqtype->execute(array($type));
  $typeexist = $reqtype->fetch();

  if (!empty($typeexist)) {
    $reqModif = $dbc-> prepare ("UPDATE massage SET ESTACTIF_MASSAGE = 0 WHERE TYPE_MASSAGE = :type");
    $reqModif->bindParam(':type', $type, PDO::PARAM_STR);
    $reqModif->execute();
    $success = "La suppression a été effectué avec succès !";
  }
  else {
    $erreur = "Le massage n'existe plus !";
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
  <title>Connexion</title>

</head>
<body>

  <?php include('../nav1.php') ?>
  <link rel="stylesheet" href="../CSS/form.css" />
  <link rel="stylesheet" href="../CSS/boot1.css" />
  <main>
    <div class="card-body px-lg-5 pt-0">
      <form style="color: #757575;" action="#!" method="POST">
        <div class="container contact">
          <div class="row">
            <div class="col-md-3" class="text-center">
              <div class="contact-info">
                <h2 class="text-center">Supprimer un massage</h2>
                <a href="../admin/admin.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Retour</a><br>

              </div>
            </div>
            <div class="col-md-9">
              <?php if (isset($erreur)) {
                echo '<font color="red">'.$erreur.'</font>';
              }
              elseif(isset($success)){
                echo '<font color="green">'.$success.'</font>';
              }
              ?>
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Veuillez choisir un massage</label>
                    <select name="typeMassage" class="form-control" placeholder="Choisissez un type de compte">
                      <optgroup label="Nom massage">
                        <?php
                        foreach ($soin as $soinsolo ):
                          echo '<option value="'.$soinsolo['TYPE_MASSAGE'].'">'.$soinsolo['TYPE_MASSAGE'].'</value>';
                        endforeach;
                        ?>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button style="width:100px" type="submit" class="btn btn-default" name="formModif">Supprimer</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
