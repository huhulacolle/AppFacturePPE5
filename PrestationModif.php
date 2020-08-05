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
    <center>
        <h4> <strong> PRESTATIONS </strong> </h4> <br>
    </center>
    <?php
include_once 'Connect.php';
$sql = 'SELECT MAX(NumPrestation) as NumPrestation FROM Prestations';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $max = $row['NumPrestation'];
}
$max++;
echo '<br>';
echo '<div class="mx-auto" style="width: 1150px;">';
?>
    <Table class="table">
        <thead>
            <tr>
                <th scope="col"> NumPrestation </th>
                <th scope="col"> NomType </th>
                <th scope="col"> NomMat</th>
                <th scope="col"> Prix </th>
                <th scope="col"> </th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <?php
include_once 'Connect.php';
$sql = 'SELECT * FROM Prestations ORDER BY NumPrestation;';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo '<tbody>';
    echo '<tr>';
    echo '<form action="Modif.php" method="post">';
    echo '<input type="hidden" name="choix" value="2">';
    echo '<td>';
    echo '<input type="text" class="form-control" name="NumPrestation" value="' . $row['NumPrestation'] . '" readonly>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" class="form-control" name="Nomtype" value="' . $row['Nomtype'] . '" required>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" class="form-control" name="NomMat" value="' . $row['NomMat'] . '" required>';
    echo '</td>';
    echo '<td>';
    echo '<input type="number" class="form-control" name="Prix" step="0.01" value="' . $row['Prix'] . '">';
    echo '</td>';
    echo '<td>';
    echo '<button type="submit" class="btn btn-primary mb-2">Modifier</button>';
    echo '</form>';
    echo '</td>';
    echo '<td>';
    echo '<form action="SuprPrestationExe.php" method="post">';
    echo '<button type="submit" name="NumPrestation" value="' . $row['NumPrestation'] . '" class="btn btn-primary mb-2">Supprimer</button>';
    echo '</form>';
    echo '</td>';
}

$dbh = null;
?>
        <form action="AjoutPrestationExe.php" method="post">
            </tr>
            <tr>
                <td>
                    <?php
echo '<input type="test" class="form-control" value="' . $max . '" readonly';
?>
                </td>
                <form action="InsertLigueExe.php">
                    <td>
                        <input type="text" class="form-control" name="Nomtype" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="NomMat" required>
                    </td>
                    <td>
                        <input type="number" class="form-control" step="any" name="Prix">
                    </td>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
                    </td>
                </form>
            </tr>
            </tbody>
    </Table>
    <br> <br> <br>

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