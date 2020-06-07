<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crosl</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php
    include_once('nav.php');
    ?>
    <br> <center> <h4> <strong> PRESTATIONS </strong> </h4> <br> </center>
    <?php
    include_once('connect.php');
    $sql =  'SELECT MAX(NumPrestation) as NumPrestation FROM prestations';
    $sth = $dbh->query($sql); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
    foreach ($result as $row){ 
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
include_once('Connect.php'); 
$sql =  'SELECT * FROM prestations ORDER BY NumPrestation;';
$sth = $dbh->query($sql); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
foreach ($result as $row) {
    echo '<tbody>';
    echo '<tr>';
          echo '<td>'; echo  $row['NumPrestation']; echo '</td>';
          echo '<td>'; echo  $row['Nomtype']; echo '</td>';
          echo '<td>'; echo $row['NomMat']; echo '</td>';
          echo '<td>'; echo $row['Prix']; echo '</td>'; 
          echo '<td>';
          echo '<form action="ModifPrestation2.php" method="post">'; 
          echo '<button type="submit" name="NumPrestation" value="'.$row['NumPrestation'].'" class="btn btn-primary mb-2">Modifier</button>';
          echo '</form>';
          echo '</td>';
          echo '<td>';
          echo '<form action="SuprPrestationExe.php" method="post">'; 
          echo '<button type="submit" name="NumPrestation" value="'.$row['NumPrestation'].'" class="btn btn-primary mb-2">Supprimer</button>';
          echo '</form>';
          echo '</td>';
}
  
$dbh=NULL; 
?>
    <form action="AjoutPrestationExe.php" method="post">
    </tr>
    <tr>
        <td>
            <?php
                echo $max;
            ?>
        </td>
        <form action="InsertLigueExe.php">
        <td>
        <input type="text" name="Nomtype">
        </td>
        <td>
            <input type="text" name="NomMat">
        </td>
        <td>
            <input type="number" step="any" name="Prix">
        </td>
        <td colspan="2">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
        </td>
        </form>
    </tr>
    </tbody>
    </Table>
<br> <br> <br>
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>