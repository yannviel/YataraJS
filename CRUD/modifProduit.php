<?php
session_start();

include('../BDD.php');

$produit = $dbc->query('SELECT * FROM produit WHERE ESTACTIF_PRODUIT = 1');
$typeProduit = null;

if (isset($_POST['ok']) || isset($_POST['formModif']) ) {
  $nom = htmlspecialchars($_POST['nom']);
  $nomProduit = htmlspecialchars($_POST['nomProduit']);
  $description = htmlspecialchars($_POST['description']);
  $prix = htmlspecialchars($_POST['prix']);
  $image = htmlspecialchars($_POST['image']);
  $stock = htmlspecialchars($_POST['stock']);
  if (isset($_POST['ok'])){
    $nom = htmlspecialchars($_POST['nom']);
    $reqtype2 = $dbc->prepare("SELECT * FROM produit WHERE NOM_PRODUIT = :nom");
    $reqtype2->bindParam(':nom', $nom, PDO::PARAM_STR);
    $reqtype2->execute();
    $typeProduit = $reqtype2->fetch();
  }

  if (isset($_POST['formModif'])) {
    $nomProduit = htmlspecialchars($_POST['nomProduit']);
    $description = htmlspecialchars($_POST['description']);
    $prix = htmlspecialchars($_POST['prix']);
    $image = htmlspecialchars($_POST['image']);
    $stock = htmlspecialchars($_POST['stock']);
    $reqtype2 = $dbc->prepare("SELECT * FROM produit WHERE NOM_PRODUIT = :nomProduit");
    $reqtype2->bindParam(':nomProduit', $nom, PDO::PARAM_STR);
    $reqtype2->execute();
    $typeSelec = $reqtype2->fetch();
    $IDmodif = $typeSelec['ID_PRODUIT'];

    if (!empty($_POST['nomProduit'])) {
      $reqModif = $dbc->prepare("UPDATE produit SET NOM_PRODUIT = :nom WHERE ID_PRODUIT = :idproduit");
      $reqModif2 = $dbc->prepare("UPDATE produit SET DESCRIPTION_PRODUIT = :description WHERE ID_PRODUIT = :idproduit");
      $reqModif3 = $dbc->prepare("UPDATE produit SET PRIX_PRODUIT = :prix WHERE ID_PRODUIT = :idproduit");
      if (!empty($_POST['image'])) {
        $reqModif4 = $dbc->prepare("UPDATE produit SET IMAGE_PRODUIT = :image WHERE ID_PRODUIT = :idproduit");
        $reqModif5 = $dbc->prepare("UPDATE produit SET STOCK_PRODUIT = :stock WHERE ID_PRODUIT = :idproduit");
        $reqModif->bindParam(':nom', $nomProduit, PDO::PARAM_STR);
        $reqModif2->bindParam(':description', $description, PDO::PARAM_STR);
        $reqModif3->bindParam(':prix', $prix, PDO::PARAM_STR);
        $reqModif4->bindParam(':image', $image, PDO::PARAM_STR);
        $reqModif5->bindParam(':stock', $stock, PDO::PARAM_STR);
        $reqModif->bindParam(':idproduit', $IDmodif, PDO::PARAM_STR);
        $reqModif2->bindParam(':idproduit', $IDmodif, PDO::PARAM_STR);
        $reqModif3->bindParam(':idproduit', $IDmodif, PDO::PARAM_STR);
        $reqModif4->bindParam(':idproduit', $IDmodif, PDO::PARAM_STR);
        $reqModif5->bindParam(':idproduit', $IDmodif, PDO::PARAM_STR);
        $reqModif->execute();
        $reqModif2->execute();
        $reqModif3->execute();
        $reqModif4->execute();
        $reqModif5->execute();
        $success = "La modification a été effectué avec succès ! ";
      }else{
        $erreur = "Le champs de l'image doit être rempli";
      }
    }
    else {
      $erreur = "Tout les champs doivent être remplis.";
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
                <h2 class="text-center">Modifier un produit</h2>
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
                    <select name="nom" class="form-control" placeholder="Choisissez un type de compte">
                      <optgroup label="Nom massage">
                        <?php
                        foreach ($produit as $produitsolo ):
                          if ($typeProduit['ID_PRODUIT'] == $produitsolo['ID_PRODUIT']) {
                            echo '<option value="'.$produitsolo['NOM_PRODUIT'].'" selected>'.$produitsolo['NOM_PRODUIT'].'</value>';
                          } else {
                            echo '<option value="'.$produitsolo['NOM_PRODUIT'].'">'.$produitsolo['NOM_PRODUIT'].'</value>';
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
                    <label for="nom">Modifier le nom du produit</label>
                    <input type="text" class="form-control" id="fname" name="nomProduit" value="<?php if (isset($_POST['ok'])){echo $typeProduit['NOM_PRODUIT'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Modifier la description du produit</label>
                    <input type="text" class="form-control" id="fname" name="description"  value="<?php if (isset($_POST['ok'])){echo $typeProduit['DESCRIPTION_PRODUIT'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Modifier le prix du produit</label>
                    <input type="text" min="0" step="0.01" class="form-control" id="fname" name="prix" value="<?php if (isset($_POST['ok'])){echo $typeProduit['PRIX_PRODUIT'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Modifier l'image du produit</label>
                    <input type="file" class="form-control" id="fname" name="image" value="<?php if (isset($_FILES['ok'])){echo $typeProduit['IMAGE_PRODUIT'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <label for="nom">Modifier la quantité en stock</label>
                    <input type="number" class="form-control" id="fname" min="0" name="stock" value="<?php if (isset($_POST['ok'])){echo $typeProduit['STOCK_PRODUIT'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button style="width: 90px;" type="submit" class="btn btn-default" name="formModif">Valider</button>
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
