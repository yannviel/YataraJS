<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

if (isset($_POST['formModif'])) {
  if (!empty($_POST['type']) && !empty($_POST['description'])) {

    $type = htmlspecialchars($_POST['type']);
    $description = htmlspecialchars($_POST['description']);
    $actif = 1;

    $ins = $dbc->prepare('INSERT INTO massage (TYPE_MASSAGE, DESCRIPTION_MASSAGE, ESTACTIF_MASSAGE) VALUES(?,?,?)');
    $ins -> execute(array($type, $description, $actif));

    $success = "Votre soin à bien été ajouté";
  }
  else {
    $erreur = "Veuillez remplir tous les champs.";
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

      <!-- Form -->
      <form style="color: #757575;" action="#!" method="POST">

        <div class="container contact">
          <div class="row">
            <div class="col-md-3" class="text-center">
              <div class="contact-info">
                <h2 class="text-center">Ajout d'un soin</h2>
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
                    <label for="type">Veuillez insérer le nom du massage<span class="redstar">*</span></label>
                    <input type="text" class="form-control" id="fname" placeholder="Le nom du massage est..." name="type">
                  </div>
                  <div class="col-sm-10">
                    <label for="type">Veuillez insérer la description du massage<span class="redstar">*</span></label>
                    <input type="text" class="form-control" id="fname" placeholder="La description du massage est..." name="description">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button style="width: 90px;" type="submit" class="btn btn-default" name="formModif">Ajouter</button>
                  </div>
                </div>
                <span class="redstar">*</span> Champs obligatoires
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