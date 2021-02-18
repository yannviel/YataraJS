<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

$resCo = $dbc->query('SELECT * FROM commande r INNER JOIN client c on r.ID_CLIENT = c.ID_CLIENT');

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
  <title>Ajout client/admin - Yatara massages</title>

</head>
<body>

  <?php include('../nav1.php') ?>
  <link rel="stylesheet" href="../CSS/form.css" />
  <link rel="stylesheet" href="../CSS/boot1.css" />
  <main>
    <div style="height: 100%; width: 100%; padding: 9%;">
      <table class="table table-striped" style="border: solid 1px lightgray">
        <thead>
          <tr style="background-color:#e2725b ; color: white;">
            <th scope="col">N° commande</th>
            <th scope="col">Nom Client</th>
            <th scope="col">Prenom Client</th>
            <th scope="col">Prix commande</th>
            <th scope="col">Méthode de paiement</th>
            <th scope="col">Statut du paiement</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($resCo as $infoco): ?>
              <?php if ($infoco['ESTACTIF_COMMANDE'] == 1): ?>
                <tr>
                  <th scope="row"><?php echo $infoco['ID_COMMANDE']; ?></th>
                  <td><?php echo $infoco['NOM_CLIENT']; ?></td>
                  <td><?php echo $infoco['PRENOM_CLIENT']; ?></td>
                  <td><?php echo $infoco['PRIX_COMMANDE']; ?></td>
                  <td><?php echo $infoco['TYPE_FACTURATION']; ?></td>
                  <td><?php echo $infoco['ETAT_COMMANDE']; ?></td>
                </tr>
              <?php endif; ?>
              <?php endforeach; ?>
        </tbody>
      </table>
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
