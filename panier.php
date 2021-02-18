<?php
session_start();
include('BDD.php');
include_once("fonctions-panier.php");

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null){
  if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p est un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   } else
    $q = intval($q);
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++){

          if ($QteArticle[$i]  <= $_SESSION['panier']['stock'][$i]) {
                modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
          }else {
            $erreur = "Il n'y a pas assez de quantité en stock.";
          }
        } break;

      Default:
         break;
   }
}


echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre panier</title>
</head>
<body>

  <?php include('nav.php') ?>
  <link rel="stylesheet" href="CSS/form.css" />
  <link rel="stylesheet" href="CSS/boot1.css" />
  <main>
    <form method="post" action="#">
      <h1 style="color:#e2725b; margin-left:43%; margin-top: 2%;">Votre panier</h1>
      <?php if (isset($erreur)) {
        echo '<font color="red">'.$erreur.'</font>';
      }
      elseif(isset($success)){
        echo '<font color="green">'.$success.'</font>';
      }?>
    <div style="height: 100%; width: 100%; padding: 3%;">
      <table class="table table-striped" style="border: solid 1px lightgray">
        <thead>
          <tr style="background-color:#e2725b ; color: white;">
            <th scope="col">Articles</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (creationPanier()){
            $nbArticles=count($_SESSION['panier']['libelleProduit']);
            if ($nbArticles <= 0){
              echo "<tr><td>Votre panier est vide </ td>";
              echo "<td colspan=\"3\"> </td>";
              } else {
                for ($i=0 ;$i < $nbArticles ; $i++){ ?>
                  <tr><?php
                    echo "<tr>";
                    echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                    echo "<td><input type=\"number\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                    echo "<td name=\"prix\">".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])." CHF."."</td>";
                    echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">Supprimer l'article</a></td>";
                    echo "</tr>";?>
                  </tr>
                <?php }

                echo "<tr><td colspan=\"2\"> </td>";
                echo "<td colspan=\"2\">";
                echo "Prix total : ".MontantGlobal();
                echo "</td></tr>";

                echo "<tr><td colspan=\"1\">";
                echo "<td colspan=\"3\">";
                echo "<input type=\"submit\" value=\"Actualiser\"/>";
                echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
                echo "</td></tr>";
                }
          } ?>
        </tbody>
      </table>
      <a href="commande.php">Commander</a>
    </div>
    </form>
  </main>
<?php include_once('footer.php'); ?>
</body>
</html>
