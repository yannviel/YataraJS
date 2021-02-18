<?php
session_start();
include_once("fonctions-panier.php");
include('BDD.php');

if (isset($_POST['ajoutPanier'])) {
  if (!empty($_SESSION['ID_CLIENT'])) {
    $produit = $dbc->prepare('SELECT * FROM produit WHERE ID_PRODUIT = ?');
    $produit->execute(array($_GET['id']));
      $produit = $produit->fetch();
      $libelleProduit = $produit['NOM_PRODUIT'];
      $description = $produit['DESCRIPTION_PRODUIT'];
      $prix = $produit['PRIX_PRODUIT'];
      $image = $produit['IMAGE_PRODUIT'];
      $qteP = htmlspecialchars($_POST['quantite']);
      $stock = $produit['STOCK_PRODUIT'];

    if ($qteP > $stock) {
      $erreur = "Il n'y a pas assez de quantité en stock.";
    } elseif ($qteP <= 0){
      $erreur = "Il faut rentrer une valeur pour ajouter au panier.";
    } else {
      ajouterArticle($libelleProduit,$qteP,$prix,$stock);
      $success = "Vous avez bien ajouté cet article à votre panier.";
    }
  } else {
    $erreur = "Vous devez être connecté pour ajouter cet article à votre panier.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Article - Yatara massages</title>
  <link rel="icon" type="image/png" href="../images/logo.bmp" />
</head>
<body>
  <?php include('nav.php'); ?>
  <link rel="stylesheet" href="CSS/boot1.css" />
  <main>
    <?php if (isset($_GET['id']) AND !empty($_GET['id'])):
      $get_id = htmlspecialchars($_GET['id']);

      $produit = $dbc->prepare('SELECT * FROM produit WHERE ID_PRODUIT = ?');
      $produit->execute(array($get_id));
      if ($produit->rowCount() == 1) {
        $produit = $produit->fetch();
        $libelleProduit = $produit['NOM_PRODUIT'];
        $description = $produit['DESCRIPTION_PRODUIT'];
        $prix = $produit['PRIX_PRODUIT'];
        $image = $produit['IMAGE_PRODUIT'];
        $stock = $produit['STOCK_PRODUIT'];
      }
      ?>
	<div name="error">
			<?php if (isset($erreur)) {
			  echo '<font color="red">'.$erreur.'</font>';
			} elseif(isset($success)){
			  echo '<font color="green">'.$success.'</font>';
			}?>
		</div>
      <div class="card card-cascade wider reverse" style="padding:9%; background-color: whitesmoke;">
		
        <div class="view view-cascade overlay">
          <img src="images/<?php echo $image ?>" class="d-block w-100" alt="..." style="max-height:650px;">
        </div>
        <div class="card-body card-body-cascade text-center" style="background-color: white; margin-top: 0px;">
          <h4 class="card-title"><strong><?php echo $libelleProduit ?></strong></h4>
          <p class="card-text" ><?php echo $description ?>
          <p class="card-text" >Prix unitaire: CHF <?php echo $prix ?>.-
          <br>
          <p class="card-text" >Stock:  <?php echo $stock ?> <?php if ($stock > 1) {
            echo "articles";
          } else {
            echo "article";
          }?>
          <br>
          <form  action="#" method="post">
          <label for="">Veuillez choisir la quantité: </label>
          <input type="number" name="quantite" min="0" value="" placeholder="Choix de la quantité">
          <br><br>
          <button type="submit" name="ajoutPanier" class="btn btn-default" style="background-color: #e2725b;">Ajouter au panier</button>
        </form><br>
        </div>
      </div>
    <?php endif; ?>
  </main>
  <?php include('footer.php') ?>
</body>
</html>
