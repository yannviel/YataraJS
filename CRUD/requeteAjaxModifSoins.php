<?php

include('../BDD.php');

$typemassage = htmlspecialchars($_GET['nom']);
$reqtype2 = $dbc->prepare("SELECT TYPE_MASSAGE,DESCRIPTION_MASSAGE FROM massage WHERE TYPE_MASSAGE = :type1");
$reqtype2->bindParam(':type1', $typemassage, PDO::PARAM_STR);
$reqtype2->execute();
$typeSelect = $reqtype2->fetch();

echo json_encode($typeSelect);





    ?>