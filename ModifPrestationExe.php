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
    include_once('nav.php');
    ?>
    <br>
    <?php

    if ($_POST['Nomtype'] == NULL OR $_POST['NomMat'] == NULL OR $_POST['Prix'] == NULL ) {
        echo '<form action="ModifPrestation2.php" method="post">';
        echo '<ul class="nav">';
        echo '<li class="nav-item">';
        echo '<button type="submit" name="NumPrestation" value="'.$_POST['NumPrestation'].'" class="btn btn-link">Retour</button>';
        echo '</li>';
        echo '</ul>';
        echo '</form>';
        ?>
    <br> <br> <br>
    <center>
        <h4> Erreur : vous avez oubliez de saisir au moins une valeur dans la tableau </h4>
    </center>
    <?php
    }
    else {

    include_once('connect.php');
    $sql='UPDATE prestations SET Nomtype = "'.$_POST['Nomtype'].'", NomMat = "'.$_POST['NomMat'].'", Prix = "'.$_POST['Prix'].'" WHERE NumPrestation = "'.$_POST['NumPrestation'].'"';
    $sth = $dbh->query($sql);
    $dbh=NULL; 
 

    echo '<meta http-equiv="refresh" content="0; URL=PrestationModif.php">';
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