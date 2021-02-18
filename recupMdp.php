<?php
session_start();

include('BDD.php');

if (isset($_GET('section'))) {
  $section = htmlspecialchars($_GET['section']);
}

else {
  $section = "";
}

if (isset($_POST['formrecup'])) {
  if(!empty($_POST['email'])){
    $email = htmlspecialchars($_POST['email']);
    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
      $mailexist = $dbc->prepare('SELECT ID_CLIENT, PSEUDO_CLIENT FROM client WHERE EMAIL_CLIENT = ?');
      $mailexist->execute(array($email));
      $mailexist_count = $mailexist->rowCount();
      if ($mailexist_count == 1) {
        $_SESSION['EMAIL_CLIENT'] = $email;
        $pseudo = $mailexist->fetch();
        $pseudo = $pseudo['PSEUDO_CLIENT'];
        $recupCode = "";
        for ($i=0; $i <= 8 ; $i++) {
          $recupCode .= mt_rand(0,9);
        }
        $_SESSION['recup_code'] = $recupCode;



        $mailRecup = $dbc->prepare('SELECT ID_RECUP FROM recuperation WHERE EMAIL_RECUP = ?');
        $mailRecup->execute(array($email));
        $mailRecup = $mailRecup->rowCount();


        if ($mailRecup == 1) {
          $ins = $dbc->prepare('UPDATE recuperation SET CODE_RECUP = ? WHERE EMAIL_RECUP = ?');
          $ins->execute(array($recupCode, $email));
        }
        else {
          $ins = $dbc->prepare('INSERT INTO recuperation(EMAIL_RECUP, CODE_RECUP) VALUES (?, ?)');
          $ins->execute(array($email, $recupCode));
        }
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Carine Torrent"<carine.torrent@gmail.com>'."\n";
        $header.='Content-Type:text/html; charset="utf-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
        $message = '
        <html>
        <head>
        <title>Récupération de mot de passe - Yatara massages</title>
        <meta charset="utf-8" />
        </head>
        <body>
        <font color="#303030";>
        <div align="center">
        <table width="600px">
        <tr>
        <td>

        <div align="center">Bonjour <b>'.$pseudo.'</b>,</div>
        Voici votre code de récupération: <b>'.$recupCode.'</b>
        A bientôt sur <a href="esig-sandbox.ch/team2020_1/index.php">Yatara massages</a> !

        </td>
        </tr>
        <tr>
        <td align="center">
        <font size="2">
        Ceci est un email automatique, merci de ne pas y répondre
        </font>
        </td>
        </tr>
        </table>
        </div>
        </font>
        </body>
        </html>
        ';
        mail($email, "Récupération de mot de passe - Yatara massages", $message, $header);
        header("Location:http://esig-sandbox.ch/team2020_1/recupMdp?section=code");
      }
      else {
        $erreur = "Ce mail n'existe pas !";
      }
    }
    else {
      $erreur = "Adresse mail invalide !";
    }
  }
  else {
    $erreur = "Veuillez entrez votre mail !";
  }
}

if (isset($_POST['formcode'],$_POST['code'])) {
  if (!empty($_POST['code'])) {
    $verifCode = htmlspecialchars($_POST['code']);
    $req = $dbc->prepare("SELECT * FROM recuperation WHERE EMAIL_RECUP = ? AND CODE_RECUP = ?");
    $req->execute(array($_SESSION['EMAIL_CLIENT'], $verifCode));
    $req_count = $req->rouCount();
    if ($req_count == 1) {
      $delReq = $dbc->prepare('DELETE FROM recuperation WHERE EMAIL_RECUP = ?');
      $delReq->execute(array($_SESSION['EMAIL_CLIENT']));
      header("Location:http://esig-sandbox.ch/team2020_1/recupMdp?section=changemdp");
    }
  }
  else {
    $erreur = "Veuillez entrez le code de récupération !";
  }
}

if (isset($_POST['formmdp'])) {
  if (isset($_POST['mdp'], $_POST['mdp2'])) {
    $mdp = htmlspecialchars($_POST['mdp']);
    $mdp2 = htmlspecialchars($_POST['mdp2']);
    if (!empty($mdp) AND !empty($mdp2)) {
      if ($mdp == $mdp2) {
        $mdp = sha1($mdp);
        $insMdp = $dbc->prepare('UPDATE client SET PASSWORD_CLIENT = ? WHERE EMAIL_CLIENT = ?');
        $insMdp->execute(array($mdp,$_SESSION['recup_code']));
        header("Location: http://esig-sandbox.ch/team2020_1/conneaxion.php");
      }
      else{
        $erreur = "Vos mots de passe ne correspondent pas ";
      }
    }
    else {
      $erreur = "Veuillez remplir tous les champs !";
    }
  }
  else {
    $erreur = "Veuillez remplir tous les champs !";
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
  <title>Connexion - Yatara massages</title>

</head>
<body>
  <link rel="stylesheet" href="CSS/form.css" />
  <?php include('nav.php') ?>
  <link rel="stylesheet" href="CSS/boot1.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <main>
    <?php if ($section == 'code') : ?>
      <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form style="color: #757575;" action="#!" method="POST">

          <div class="container contact">
            <div class="row">
              <div class="col-md-3">
                <div class="contact-info">
                  <h2  class="text-center">Récuperation de mot de passe</h2>
                </div>
              </div>
              <div class="col-md-9">
                <div class="contact-form">



                  <div class="form-group">
                    <div class="col-sm-10">
                      <label for="email">Adresse de messagerie<span class="redstar">*</span></label>
                      <input type="text" class="form-control" id="lname" placeholder="Votre adresse de messagerie..." name="email" style="width: 60%">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" name="formrecup">Envoyer</button>
                    </div>
                    <?php if (isset($erreur)) {
                      echo '<font color="red">'.$erreur.'</font>';
                    }
                    elseif(isset($success)){
                      echo '<font color="green">'.$success.'</font>';
                    }
                    ?>
                  </div>
                  <span class="redstar">*</span> Champs obligatoire
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    <?php elseif ($section == 'changemdp') : ?>
      <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form style="color: #757575;" action="#!" method="POST">

          <div class="container contact">
            <div class="row">
              <div class="col-md-3">
                <div class="contact-info">
                  <h2  class="text-center">Nouveau mot de passe</h2>
                </div>
              </div>
              <div class="col-md-9">
                <div class="contact-form">



                  <div class="form-group">
                    <div class="col-sm-10">
                      <label for="email">Nouveau mot de passe<span class="redstar">*</span></label>
                      <input type="text" class="form-control" id="lname" placeholder="Nouveau mot de passe..." name="mdp" style="width: 60%">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <label for="email">confirmer mot de passe<span class="redstar">*</span></label>
                      <input type="text" class="form-control" id="lname" placeholder="Confirmer mot de passe ..." name="mdp2" style="width: 60%">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" name="formmdp">Envoyer</button>
                    </div>
                    <?php if (isset($erreur)) {
                      echo '<font color="red">'.$erreur.'</font>';
                    }
                    elseif(isset($success)){
                      echo '<font color="green">'.$success.'</font>';
                    }
                    ?>
                  </div>
                  <span class="redstar">*</span> Champs obligatoire
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    <?php else : ?>
      <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form style="color: #757575;" action="#!" method="POST">

          <div class="container contact">
            <div class="row">
              <div class="col-md-3">
                <div class="contact-info">
                  <h2  class="text-center">Récuperation de mot de passe</h2>
                </div>
              </div>
              <div class="col-md-9">
                <div class="contact-form">



                  <div class="form-group">
                    <div class="col-sm-10">
                      <label for="code">Code de récupération<span class="redstar">*</span></label>
                      <input type="text" class="form-control" id="lname" placeholder="Votre code de récupération..." name="code" style="width: 60%">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" name="formcode">Envoyer</button>
                    </div>
                    <?php if (isset($erreur)) {
                      echo '<font color="red">'.$erreur.'</font>';
                    }
                    elseif(isset($success)){
                      echo '<font color="green">'.$success.'</font>';
                    }
                    ?>
                  </div>
                  <span class="redstar">*</span> Champs obligatoire
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    <?php endif; ?>
  </main>
  <?php include('footer.php') ?>
</body>
</html>
