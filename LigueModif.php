<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crosl</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style/style.css">
    <script>
  // This is an old version, for a more recent version look at
  // https://jsfiddle.net/DRSDavidSoft/zb4ft1qq/2/
  function maxLengthCheck(object) {
      if (object.value.length > object.maxLength)
          object.value = object.value.slice(0, object.maxLength)
  }
    </script>
<body>
    <?php
include_once 'nav.php';
?>
<br>
    <center>
        <h4> <strong> LIGUES </strong> </h4> <br>
    </center>
    <?php
include_once 'Connect.php';
$sql = 'SELECT MAX(NumLigue) as NumLigue FROM LIGUE;';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $max = $row['NumLigue'];
}
$max++;
echo '<div class="mx-auto" style="width: 1150px;">';
?>
    <h1 class="small">
        <Table class="table">
            <thead>
                <tr>
                    <th scope="col"> NumLigue </th>
                    <th scope="col"> NomSport </th>
                    <th scope="col"> Nom</th>
                    <th scope="col"> Adresse</th>
                    <th scope="col"> Ville</th>
                    <th scope="col"> CodePostal</th>
                    <th scope="col"> Sport </th>
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <?php
$i = 0;
include_once 'Connect.php';
$sql = 'SELECT * FROM LIGUE';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo '<tbody>';
    echo '<tr>';
    $FinNomSport = explode(" ", $row['NomSport']);
    $NomSport[$i] = end($FinNomSport);
    echo '<form action="Modif.php" method="post">';
    echo '<input type="hidden" name="choix" value="1">';
    echo '<td>';
    echo '<p>';
    echo '<input type="text" class="form-control" name="NumLigue" value="' . $row['NumLigue'] . '" readonly>';
    echo '</p>';
    echo '</td>';
    echo '<td>';
    echo 'Ligue Loraine de';
    echo '<input type="text" v-model="Sport" class="form-control" name="NomSport" id="NomSport" value="' . $NomSport[$i] . '">';
    echo '</td>';
    echo '<td>';
    echo '<p>';
    echo '<input type="text" class="form-control" name="Nom" value="' . $row['Nom'] . '" required>';
    echo '</p>';
    echo '</td>';
    echo '<td>';
    echo '<p>';
    echo '<input type="text" class="form-control" name="Addrs" value="' . $row['Addrs'] . '" required>';
    echo '</p>';
    echo '</td>';
    echo '<td>';
    echo '<p>';
    echo '<input type="text" class="form-control" name="Ville" value="' . $row['Ville'] . '" required>';
    echo '</p>';
    echo '</td>';
    echo '<td>';
    echo '<p>';
    echo '<input type="number" class="form-control" name="CodPost" step="0.01" value="' . $row['CodPost'] . '" maxlength="5" required>';
    echo '</p>';
    echo '</td>';
    echo '<td>';
    echo '<p>';
    echo '<input type="text" class="form-control" name="Sport" id="Sport" value="' . $row['Sport'] . '" onchange="updateInput(this.value)" required>';
    echo '</p>';
    echo '</td>';
    $i++;
    echo '<td>';
    echo '<p>';
    echo '<button type="submit" class="btn btn-primary mb-2">Modifier</button>';
    echo '</p>';
    echo '</form>';
    echo '</td>';
    echo '<td>';
    echo '<form action="SuprLigueExe.php" method="post">';
    echo '<p>';
    echo '<button type="submit" name="NumLigue" value="' . $row['NumLigue'] . '" class="btn btn-primary mb-2">Supprimer</button>';
    echo '</p>';
    echo '</form>';
    echo '</td>';
}

$dbh = null;
?>
            <form action="AjoutLigueExe.php" method="post">
                </tr>
                <tr>
                    <td> <p>
                        <?php
echo '<input type="text" class="form-control" value="' . $max . '" readonly';
?>
                   </p> </td>
                    <form action="InsertLigueExe.php">
                        <td>
                         Ligue Loraine de <input type="text" class="form-control" name="LigueSport" required>
                        </td>
                        <td>
                          <p> <input type="text" class="form-control" class="form-control" name="Nom" required> </p>
                        </td>
                        <td>
                            <p> <input type="text" class="form-control" name="Addrs" required> </p>
                        </td>
                        <td>
                            <p> <input type="text" class="form-control" name="Ville" required> </p>
                        </td>
                        <td>
                            <p> <input type="number" oninput="maxLengthCheck(this)" maxlength="5" class="form-control" name="CodPost" required> </p>
                        </td>
                        <td>
                            <p> <input type="text" class="form-control" name="Sport" required> </p>
                        </td>
                        <td colspan="2">
                              <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
                        </td>
                    </form>
                </tr>
                </tbody>
                </h6>
        </Table>
    </h1>
    </div>
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