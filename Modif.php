<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crosl</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php
include_once 'nav.php';
?>
    <br>
    <?php
switch ($_POST['choix']) {
    case 1:
        if ($_POST['NomSport'] == null or $_POST['Nom'] == null or $_POST['Sport'] == null) {
            ?>
    <script>
        alert("Erreur : vous avez oubliez de saisir au moins une valeur dans la tableau")
    </script>
    <meta http-equiv="refresh" content="0; URL=LigueModif.php">
    <?php
} else {

            include_once 'Connect.php';
            $sql = 'UPDATE LIGUE SET NomSport = "Ligue Loraine de ' . $_POST['NomSport'] . '", Nom = "' . $_POST['Nom'] . '", Addrs = "' . $_POST['Addrs'] . '", Ville = "' . $_POST['Ville'] . '", CodPost = "' . $_POST['CodPost'] . '", Sport = "' . $_POST['Sport'] . '" WHERE NumLigue = ' . $_POST['NumLigue'] . '';
            $sth = $dbh->query($sql);
            $dbh = null;
            ?>
    <script>
        alert("La table à était modifier avec succès");
    </script>
    <meta http-equiv="refresh" content="0; URL=LigueModif.php">';
    <?php }
        break;
    case 2:
        if ($_POST['Nomtype'] == null or $_POST['NomMat'] == null or $_POST['Prix'] == null) {
            echo '<form action="ModifPrestation2.php" method="post">';
            echo '<ul class="nav">';
            echo '<li class="nav-item">';
            echo '<button type="submit" name="NumPrestation" value="' . $_POST['NumPrestation'] . '" class="btn btn-link">Retour</button>';
            echo '</li>';
            echo '</ul>';
            echo '</form>';
            ?>
    <br> <br> <br>
    <script>
        alert("Erreur : vous avez oubliez de saisir au moins une valeur dans la tableau")
    </script>
    <meta http-equiv="refresh" content="0; URL=PrestationModif.php">
    <?php
} else {

            include_once 'Connect.php';
            $sql = 'UPDATE Prestations SET Nomtype = "' . $_POST['Nomtype'] . '", NomMat = "' . $_POST['NomMat'] . '", Prix = "' . $_POST['Prix'] . '" WHERE NumPrestation = "' . $_POST['NumPrestation'] . '"';
            $sth = $dbh->query($sql);
            $dbh = null;
            ?>
    <script>
        alert("La table à était modifier avec succès");
    </script>
    <?php
echo '<meta http-equiv="refresh" content="0; URL=PrestationModif.php">';
        }
        break;
    default:
        echo '<script> alert("Erreur") </script>';
        echo '<meta http-equiv="refresh" content="0; URL=index.php">';
        break;
}
?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>