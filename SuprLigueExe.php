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
if ($_POST['NumLigue'] == null) {
    ?>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="LigueModif.php">Retour</a>
        </li>
    </ul>
    <br> <br> <br>
    <center>
        <h4> Erreur : vous avez oubliez de saisir au moins une valeur dans la tableau </h4>
    </center>
    <?php
} else {
    include_once 'Connect.php';
    $sql = 'SELECT NumLigue FROM Facture';
    $sth = $dbh->query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $NumLigue = $row['NumLigue'];
    }
    if ($_POST['NumLigue'] == $NumLigue) {
        ?>
        <script> alert('Impossible de supprimer cette colonne') </script>
        <meta http-equiv="refresh" content="0; URL=LigueModif.php">
        <?php
    }
    else {
        $sql = 'DELETE FROM LIGUE WHERE NumLigue = ' . $_POST['NumLigue'] . '';
        $sth = $dbh->query($sql);
        $dbh = null;
        echo '<meta http-equiv="refresh" content="0; URL=LigueModif.php">';
    }
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