<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

$soin = $dbc->query('SELECT * FROM massage WHERE ESTACTIF_MASSAGE = 1');
$typeSelect = null;

if (isset($_POST['ok']) || isset($_POST['formModif']) ) {
  $typemassage = htmlspecialchars($_POST['typeMassage']);
  $type = htmlspecialchars($_POST['type']);
  if (isset($_POST['ok'])){
    $typemassage = htmlspecialchars($_POST['typeMassage']);
    $reqtype2 = $dbc->prepare("SELECT * FROM massage WHERE TYPE_MASSAGE = :type1");
    $reqtype2->bindParam(':type1', $typemassage, PDO::PARAM_STR);
    $reqtype2->execute();
    $typeSelect = $reqtype2->fetch();
  }

  if (isset($_POST['formModif'])) {
    $type = htmlspecialchars($_POST['type']);
    $description = htmlspecialchars($_POST['description']);
    $reqtype2 = $dbc->prepare("SELECT * FROM massage WHERE TYPE_MASSAGE = :type");
    $reqtype3 = $dbc->prepare("SELECT * FROM massage WHERE DESCRIPTION_MASSAGE = :description");
    $reqtype2->bindParam(':type', $typemassage, PDO::PARAM_STR);
    $reqtype3->bindParam(':description', $description, PDO::PARAM_STR);
    $reqtype2->execute();
    $reqtype3->execute();
    $typeSelec = $reqtype2->fetch();
    $typeSelect = $reqtype3->fetch();
    $IDmodif = $typeSelec['ID_MASSAGE'];

    if (!empty($_POST['type']) && !empty($_POST['description'])) {
      $reqModif = $dbc->prepare("UPDATE massage SET TYPE_MASSAGE = :type WHERE ID_MASSAGE = :idmassage");
      $reqModif1 = $dbc->prepare("UPDATE massage SET DESCRIPTION_MASSAGE = :description WHERE ID_MASSAGE = :idmassage");
      $reqModif->bindParam(':type', $type, PDO::PARAM_STR);
      $reqModif1->bindParam(':description', $description, PDO::PARAM_STR);
      $reqModif->bindParam(':idmassage', $IDmodif, PDO::PARAM_STR);
      $reqModif1->bindParam(':idmassage', $IDmodif, PDO::PARAM_STR);
      $reqModif->execute();
      $reqModif1->execute();
      $success = "La modification a été effectué avec succès !";
    } else {
      $erreur = "Veuillez remplir tous les champs.";
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
                <h2 class="text-center">Modifier un massage</h2>
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
                    <label for="nom">Veuillez choisir le nom du massage</label>
                    <select name="typeMassage" class="form-control" placeholder="Choisissez un type de compte">
                      <optgroup label="Nom massage">
                        <?php
                        foreach ($soin as $soinsolo ):
                          if ($typeSelect['ID_MASSAGE'] == $soinsolo['ID_MASSAGE']) {
                            echo '<option value="'.$soinsolo['TYPE_MASSAGE'].'" selected>'.$soinsolo['TYPE_MASSAGE'].'</value>';
                          } else {
                            echo '<option value="'.$soinsolo['TYPE_MASSAGE'].'">'.$soinsolo['TYPE_MASSAGE'].'</value>';
                          }
                        endforeach;
                        ?>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button name="ok" class="btn btn-default"><span>Ok</span></button>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Modifier le nom du massage</label>
                    <input type="text" class="form-control" id="fname" name="type" value="<?php if (isset($_POST['ok'])){echo $typeSelect['TYPE_MASSAGE'];} ?>">
                  </div>
                  <div class="col-sm-10">
                    <label for="nom">Modifier la description du massage</label>
                    <input type="text" class="form-control" id="fname" name="description" value="<?php if (isset($_POST['ok'])){echo $typeSelect['DESCRIPTION_MASSAGE'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button name="formModif" class="btn btn-default">Valider</button>
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
