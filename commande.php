<?php

session_start();
include('BDD.php');
include_once('fonctions-panier.php');

if (isset($_POST['formModif'])) {
  if (!empty($_POST["paiement"])) {
    $idClient = $_SESSION['ID_CLIENT'];
    $etatCommande = "En attente";
    $typeFacture = $_POST["paiement"];
    $estActifCommande = 1;
    $prix = $_SESSION['panier']['prixProduit'];

    if ($typeFacture == "cash"){
      //$tabpanier = $_SESSION['panier'];
      $cash = $typeFacture;
    } elseif ($typeFacture == "twint") {
      $twint = $typeFacture;
    }

    $ins = $dbc->prepare('INSERT INTO commande (ID_CLIENT, PRIX_COMMANDE, ETAT_COMMANDE, TYPE_FACTURATION, ESTACTIF_COMMANDE) VALUES(?,?,?,?,?)');
    $ins -> execute(array($idClient, MontantGlobal(), $etatCommande, $typeFacture, $estActifCommande));

    $success = "Votre commande à bien été enregistré.";
     for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++){

       $nomproduit = $_SESSION['panier']['libelleProduit'][$i];

       $idproduit = $dbc->prepare('SELECT ID_PRODUIT FROM produit WHERE ID_PRODUIT = ?');
       $idproduit->bindParam(':nom', $nomproduit, PDO::PARAM_STR);
       $id = $idproduit->fetch();

       $inse = $dbc->prepare('INSERT INTO commandeProduit (ID_CLIENT, PRIX_COMMANDE, ETAT_COMMANDE, TYPE_FACTURATION, ESTACTIF_COMMANDE) VALUES(?,?,?,?,?)');
       $inse -> execute(array($idClient, MontantGlobal(), $etatCommande, $typeFacture, $estActifCommande));
     }
  } else{
    $erreur = "Vous devez choisir un mode de paiement pour passer commande.";
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8"><meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">
  <link rel="icon" type="image/png" href="images/logo.bmp" />
  <title>Connexion</title>

</head>
<body>

  <?php include('nav.php') ?>
  <link rel="stylesheet" href="CSS/form.css" />
  <link rel="stylesheet" href="CSS/boot1.css" />
  <main>
    <div class="card-body px-lg-5 pt-0">
      <form style="color: #757575;" action="#" method="POST">
        <div class="container contact">
          <div class="row">
            <div class="col-md-3" class="text-center">
              <div class="contact-info">
                <h2 class="text-center">Votre commande</h2>
              </div>
            </div>
            <div class="col-md-9">
              <?php if (isset($erreur)){
                echo '<font color="red">'.$erreur.'</font>';
              } elseif(isset($success)){
                echo '<font color="green">'.$success.'</font>';
              } ?>
              <div class="contact-form">
                <div class="form-group">
                  <div class="col-sm-10">
                    <legend for="nom">Récapitulatif de votre commande:</legend>
                    <tr>
                      <td>Article</td>
                      <td>Quantité</td>
                      <td>Prix</td>
                    </tr><br>
                    <?php
                    $nbArticles=count($_SESSION['panier']['libelleProduit']);
                    if ($nbArticles <= 0){
                      echo "<tr><td>Votre panier est vide </ td>";
                      echo "<td colspan=\"3\"> </td>";
                      } else {
                        for ($i=0 ;$i < $nbArticles ; $i++){ ?>
                          <tr><?php
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."                                          </ td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."              </td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])." CHF."."</td>";
                            echo "</tr>";?><br>
                          </tr>
                        <?php } ?>
                        <br> <?php
                        echo "<tr><td colspan=\"2\"> </td>";
                        echo "<td colspan=\"2\">";
                        echo "Prix total de la commande : CHF ".MontantGlobal().".-";
                        echo "</td></tr>";
                      }?>
                    <br><br>
                    <fieldset>
                      <legend class="Legende3">Mode de paiement</legend>
                      <input type="radio" name="paiement" value="cash"/>
                      <label for="moinsde15">Cash</label><br>

                      <input type="radio" name="paiement" value="twint"/>
                      <label for="entre15-25">TWINT</label>
                    </fieldset>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button style="width:100px" type="submit" class="btn btn-default" name="formModif">Commander</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
  <?php include('footer1.php') ?>
</body>
</html>
