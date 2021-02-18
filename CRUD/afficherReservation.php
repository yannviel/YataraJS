<?php session_start(); ?>
<?php if (!empty($_SESSION['PSEUDO_EMPLOYE'])) {  ?>
<?php


include('../BDD.php');

$resCli = $dbc->query('SELECT * FROM reservation r INNER JOIN client c on r.ID_CLIENT = c.ID_CLIENT INNER JOIN massage m on r.ID_MASSAGE = m.ID_MASSAGE');


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
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Massage choisi</th>
            <th scope="col">Durée</th>
            <th scope="col">Date rendez-vous</th>
            <th scope="col">Heure rendez-vous</th>
            <th scope="col">Date prise rendez vous</th>
            <th scope="col">Méthode de paiement</th>
            <th scope="col">Statut du paiement</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($resCli as $infoclient): ?>
              <?php if ($infoclient['ESTACTIF_RESERVATION'] == 1): ?>
                <tr>
                  <th scope="row"><?php echo $infoclient['ID_RESERVATION']; ?></th>
                  <td><?php echo $infoclient['NOM_CLIENT']; ?></td>
                  <td><?php echo $infoclient['PRENOM_CLIENT']; ?></td>
                  <td><?php echo $infoclient['TYPE_MASSAGE']; ?></td>
                  <td><?php echo $infoclient['DUREE_RESERVATION']; ?></td>
                  <td><?php echo $infoclient['DATE_RDV_RESERVATION']; ?></td>
                  <td><?php echo $infoclient['HEURE_RDV_RESERVATION']; ?></td>
                  <td><?php echo $infoclient['DATE_RESERVATION']; ?></td>
                  <td><?php echo $infoclient['METHODE_PAIEMENT_RESERVATION']; ?></td>
                  <td><?php echo $infoclient['STATUT_PAIEMENT']; ?></td>
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
