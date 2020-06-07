<a href='index.php'> <img src="style/mdl.png" height="150px" width="150px"> </a>
<center><h2> Application Facturation </h2></center> 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
      <a class="nav-item nav-link" href="LigueModif.php">Ligues</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-item nav-link" href="PrestationModif.php">Prestations</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Facture
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="FormFacture.php">Créer une facture</a>
          <a class="dropdown-item" href="VoirFacture.php">Voir les factures</a>
      </li>
    </ul>
  </div>
</nav>
<script type="text/javascript"> //empêche le clique droit 
    //<!--
       document.oncontextmenu = new Function("return false"); 
    //-->
    </script>