<link rel="stylesheet" href="../CSS/boot1.css" />

<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a href="../index.php"><img src="../images/LOGO_C.T.png" alt="" id="logoY"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
  aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent-333">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="../index.php">Accueil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../soins.php">Soins</a>
    </li>
	<li class="nav-item">
	  <a class="nav-link" href="../temoignage.php">Témoignages</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../portrait.php">Portrait</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../prendreRDV.php">Rendez-vous</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="../produit.php">Produits</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../bonCadeau.php">Bons cadeaux</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../blog.php">Blog</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../contact.php">Contact</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto nav-flex-icons">
    <li class="nav-item">
      <a class="nav-link waves-effect waves-light">
        <i class="fab fa-twitter"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-effect waves-light">
        <i class="fab fa-google-plus-g"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <img src="../images/iconeLog.png" alt="" style="height:35px;">
      <i class="fas fa-user"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-default"
    aria-labelledby="navbarDropdownMenuLink-333">
    <?php if (!empty($_SESSION['PSEUDO_CLIENT'])) :?>
      <p class="dropdown-item">Bienvenue <?php echo $_SESSION['PSEUDO_CLIENT']; ?></p>
      <a class="dropdown-item" href="../espaceClient/espaceClient.php">Mon profil</a>
	  <a class="dropdown-item" href="../panier.php">Mon panier</a>
      <a class="dropdown-item" href="../deconnexion.php">Deconnexion</a>
    <?php elseif (!empty($_SESSION['PSEUDO_EMPLOYE'])) :?>
      <p class="dropdown-item">Bienvenue <?php echo $_SESSION['PSEUDO_EMPLOYE']; ?> !</p>
      <a class="dropdown-item" href="../admin/admin.php">Page admin</a>
      <a class="dropdown-item" href="../deconnexion.php">Deconnexion</a>
    <?php   else :  ?>
      <a class="dropdown-item" href="../connexion.php">Connexion</a>
      <a class="dropdown-item" href="../register.php">Inscription</a>
    <?php   endif;  ?>
  </div>
</li>
</ul>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</nav>
