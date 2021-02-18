<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php
include('../BDD.php');




$blog = $dbc->query('SELECT TITRE_BLOG FROM blog ORDER BY DATE_BLOG DESC');




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <ul>
      <?php while($a = $blog->fetch()) { ?>
      <li><?= $a['TITRE_BLOG'] ?> </a> | <a href="modifArticle.php?">Modifier</a> | <a href="supArticle.php?id">Supprimer</a></li>
      <?php } ?>
   <ul>
</body>
<?php }
else {
  echo "<html>
                <head>
                <body onload=\"javascript:alert('Connectez-vous avec un compte administrateur');window.location='../index.php'\">
                </body>
                </head>";
              }
   ?>
