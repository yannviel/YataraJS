<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php
include('../BDD.php');



if(isset($_POST['formModif'])) {
  if(!empty($_POST['titreArticle']) AND !empty($_POST['contenuArticle'])) {

    $titreArticle = htmlspecialchars($_POST['titreArticle']);
    $contenuArticle = htmlspecialchars($_POST['contenuArticle']);
    $imageArticle = htmlspecialchars( $_FILES["imageArticle"]["name"]);
    $estActifblog = 1;

    $ins = $dbc->prepare('INSERT INTO blog (TITRE_BLOG, IMAGE_BLOG, DESCRIPTION_BLOG, DATE_BLOG, ESTACTIF_BLOG) VALUES(?,?,?,now(),?)');
    $ins -> execute(array($titreArticle,$imageArticle,$contenuArticle,$estActifblog));

    $success = 'votre article à bien été posté';

  } else {
      $erreur = 'Veuillez remplir tous les champs';
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
  <title>ajout d'articel</title>

</head>
<body>

  <?php include('../nav1.php') ?>
  <link rel="stylesheet" href="../CSS/form.css" />
  <link rel="stylesheet" href="../CSS/boot1.css" />
  <main>
    <div class="card-body px-lg-5 pt-0">

      <!-- Form -->
      <form style="color: #757575;" action="ajoutArticle.php" method="POST" enctype="multipart/form-data">

        <div class="container contact">
          <div class="row">
            <div class="col-md-3" class="text-center">
              <div class="contact-info">
                <h2 class="text-center">Ajout d'un article</h2>
              </div>
            </div>
            <div class="col-md-9">
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="type">Titre<span class="redstar">*</span></label>
                    <input type="text" class="form-control" id="fname" placeholder="Titre de l'article..." name="titreArticle" value="<?php if(isset($_POST['nomPersonne'])) {echo $_POST['nomPersonne']; } ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="type">Contenu<span class="redstar">*</span></label>
                    <textarea class="form-control" id="fname" placeholder="Le Contenu de l'article..." name="contenuArticle" value="<?php if(isset($_POST['nomPersonne'])) {echo $_POST['nomPersonne']; } ?>"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="type">Image à insérer<span class="redstar">*</span></label>
                    <input style="height:45px; "type="file" class="form-control" id="fname"  name="imageArticle" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button style="width: 90px;" type="submit" class="btn btn-default" name="formModif">Ajouter</button>
                  </div>
                  <?php if (isset($erreur)) {
                    echo '<font color="red">'.$erreur.'</font>';
                  }
                  elseif(isset($success)){
                    echo '<font color="green">'.$success.'</font>';
                  }
                  ?>
                  <?php
                  $target_dir = "../images/";
                  $target_file = $target_dir . basename($_FILES["imageArticle"]["name"]);
                  $uploadOk = 1;
                  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                  // pour voir si l'image est vraiement une image
                  if(isset($_POST["formModif"])) {
                    $check = getimagesize($_FILES["imageArticle"]["tmp_name"]);
                    if($check !== false) {
                      echo "le fichier est une image - " . $check["mime"] . ".";
                      $uploadOk = 1;
                    } else {
                      echo "le fichier n'est pas une image.";
                      $uploadOk = 0;
                    }
                  }

                  // regarde si l'image existe déjà
                  if (file_exists($target_file)) {
                    echo "désollé, l'image existe déjà.";
                    $uploadOk = 0;
                  }

                  // Check file size
                  if ($_FILES["imageArticle"]["size"] > 500000) {
                    echo "votre ficheir est trop volumineux.";
                    $uploadOk = 0;
                  }

                  // autorise seulement un certain type de fichier
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                  && $imageFileType != "gif" ) {
                    echo "Seul les fichiers JPG, JPEG, PNG & GIF sont acceptés";
                    $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                    echo "votre image n'a pas été uploadé.";
                  // if everything is ok, try to upload file
                  } else {
                    if (move_uploaded_file($_FILES["imageArticle"]["tmp_name"], $target_file)) {
                      echo "le fichier". htmlspecialchars( basename( $_FILES["imageArticle"]["name"])). " a été uploadé.";
                    } else {
                      echo "il y a eu une erreur pendant l'upload de votre image.";
                    }
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
