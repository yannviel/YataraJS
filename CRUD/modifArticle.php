<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

$soin = $dbc->query('SELECT * FROM blog WHERE ESTACTIF_BLOG = 1');
$typeSelect = null;

if (isset($_POST['ok']) || isset($_POST['formModif']) ) {
  $titreArticle = htmlspecialchars($_POST['titreArticle']);
  $contenu = htmlspecialchars($_POST['contenu']);
  $titre = htmlspecialchars($_POST['titre']);
  if (isset($_POST['ok'])){
    $titreArticle = htmlspecialchars($_POST['titreArticle']);
    $reqtype2 = $dbc->prepare("SELECT * FROM blog WHERE TITRE_BLOG = :titre");
    $reqtype2->bindParam(':titre', $titreArticle, PDO::PARAM_STR);
    $reqtype2->execute();
    $typeSelect = $reqtype2->fetch();
  }

  if (isset($_POST['formModif'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $reqtype2 = $dbc->prepare("SELECT * FROM blog WHERE TITRE_BLOG = :titre");
    $reqtype2->bindParam(':titre', $titreArticle, PDO::PARAM_STR);
    $reqtype2->execute();
    $typeSelec = $reqtype2->fetch();
    $IDmodif = $typeSelec['ID_BLOG'];

    if (!empty($_POST['titre'])) {
      $reqModif = $dbc->prepare("UPDATE blog SET TITRE_BLOG = :titre WHERE ID_BLOG = :idblog");
      $reqModif2 = $dbc->prepare("UPDATE blog SET DESCRIPTION_BLOG = :contenu WHERE ID_BLOG = :idblog");
      $reqModif->bindParam(':titre', $titre, PDO::PARAM_STR);
      $reqModif2->bindParam(':contenu', $contenu, PDO::PARAM_STR);
      $reqModif->bindParam(':idblog', $IDmodif, PDO::PARAM_STR);
      $reqModif2->bindParam(':idblog', $IDmodif, PDO::PARAM_STR);
      $reqModif->execute();
      $reqModif2->execute();
      $success = "La modification a été effectué avec succès !";
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
  <link rel="icon" type="image/png" href="../images/logo.bmp" />
  <title>Yatara massages - Modifier article</title>

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
                <h2 class="text-center">Modifier un article</h2>
                <a href="../admin/admin.php" class="btn btn-default" style="background-color:#b8aaa0; Color:black; text-decoration:none; margin-bottom: 9px;  width: 150px;  font-size: 130%;">Retour</a><br>
              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Choix du massage</label>
                    <select name="titreArticle" class="form-control" placeholder="Choisissez un type de compte">
                      <optgroup label="Titre">
                        <?php
                        foreach ($soin as $soinsolo ):
                          if ($typeSelect['ID_BLOG'] == $soinsolo['ID_BLOG']) {
                            echo '<option value="'.$soinsolo['TITRE_BLOG'].'" selected>'.$soinsolo['TITRE_BLOG'].'</value>';
                          } else {
                            echo '<option value="'.$soinsolo['TITRE_BLOG'].'">'.$soinsolo['TITRE_BLOG'].'</value>';
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
                    <label for="nom">Modifier le titre</label>
                    <input type="text" class="form-control" id="fname" name="titre" value="<?php if (isset($_POST['ok'])){echo $typeSelect['TITRE_BLOG'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Modifier le contenu</label>
                    <textarea type="text" class="form-control" id="fname" name="contenu"><?php if (isset($_POST['ok'])){echo $typeSelect['DESCRIPTION_BLOG'];} ?></textarea>
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
