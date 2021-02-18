<?php
//Source:
/*https://jcrozier.developpez.com/articles/web/panier/*/


//Créer le panier
function creationPanier(){
	$ret=false;
	if (isset( $_SESSION['panier']))
		$ret = true;
	else{
		$_SESSION['panier']=array();
		$_SESSION['panier']['libelleProduit'] = array();
		$_SESSION['panier']['qteProduit'] = array();
		$_SESSION['panier']['prixProduit'] = array();
		$_SESSION['panier']['stock'] = array();

		$ret=true;
	}
	return $ret;
}

//Ajout produit
function ajouterArticle($libelleProduit,$qteProduit,$prixProduit,$stock){
	if (creationPanier()){
		$positionProduit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);

		if ($positionProduit !== false){
			$_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
		}
		else {
		  array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
			array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
			array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
			array_push( $_SESSION['panier']['stock'],$stock);
		}
	}
	else
		echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

//Suppression d'un article
function supprimerArticle($libelleProduit){
	if (creationPanier()){
		$tmp=array();

		$tmp['libelleProduit'] = array();
		$tmp['qteProduit'] = array();
		$tmp['prixProduit'] = array();
		$tmp['stock'] = array();

		for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++){
			if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit){
				array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
				array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
				array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
				array_push( $tmp['stock'],$_SESSION['panier']['stock'][$i]);

			}
		}

		$_SESSION['panier'] =  $tmp;

		unset($tmp);
	} else
		echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function modifierQTeArticle($libelleProduit,$qteProduit){
	if (creationPanier()){
		if ($qteProduit > 0){
			$positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

			if ($positionProduit !== false){
				$_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
			}
		}
		else
			supprimerArticle($libelleProduit);
	} else
			echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

//Compter le nombre d'articles
function compterArticles(){
   if (isset($_SESSION['panier']))
    return count($_SESSION['panier']['libelleProduit']);
   else
    return 0;
}

//Supprime le panier
function supprimePanier(){
   unset($_SESSION['panier']);
}

//Renvoie le montant du panier
function MontantGlobal(){
		$total=0;
		for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++) {
			$total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
		}
		return $total;
	}
?>
