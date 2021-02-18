<?php
session_start();
include('../BDD.php');

$produit = $dbc->query('SELECT * FROM produit WHERE ESTACTIF_PRODUIT = 1');

if (isset($_POST['formModif'])) {
  $type = htmlspecialchars($_POST['typeProduit']);
  $reqtype = $dbc->prepare("SELECT * FROM produit WHERE NOM_PRODUIT = ?");
  $reqtype->execute(array($type));
  $typeexist = $reqtype->fetch();
  if (!empty($typeexist)) {
    $reqModif = $dbc-> prepare ("UPDATE produit SET ESTACTIF_PRODUIT = 0 WHERE NOM_PRODUIT = :type");
    $reqModif->bindParam(':type', $type, PDO::PARAM_STR);
    $reqModif->execute();
    $success = "La suppression a été effectué avec succès !";
  } else {
    $erreur = "Veuillez choisir un produit pour le supprimer.";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
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
                <h2 class="text-center">Supprimer un produit</h2>
                <a href="../admin/admin4.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Retour</a><br>
              </div>
            </div>
            <div class="col-md-9">
              <?php if (isset($erreur)) {
                echo '<font color="red">'.$erreur.'</font>';
              } elseif(isset($success)){
                echo '<font color="green">'.$success.'</font>';
              } ?>
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Veuillez choisir le nom d'un produit</label>
                    <select name="typeProduit" class="form-control">
                      <optgroup label="Nom produit">
                        <?php
                        foreach ($produit as $produitsolo ):
                          echo '<option value="'.$produitsolo['NOM_PRODUIT'].'">'.$produitsolo['NOM_PRODUIT'].'</value>';
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
