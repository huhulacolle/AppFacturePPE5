<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crosl</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<form action="ModifPrestationExe.php" method="post">
    <?php
    include_once('nav.php');
    ?>
            <ul class="nav">
        <li class="nav-item">
        <a class="nav-link active" href="PrestationModif.php">Retour</a>
        </li>
        </ul>
        <br>   
    <div class="mx-auto" style="width: 1000px;">
    <table class="table table-bordered">
  <thead>
    <tr>
    <th scope="col"> NumPrestation </th>
    <th scope="col"> NomType </th>
    <th scope="col"> NomMat</th>
    <th scope="col"> Prix</th>

    </tr>
  </thead>
<?php
include_once('Connect.php'); 
$sql =  'SELECT * FROM prestations WHERE NumPrestation = '.$_POST['NumPrestation'].'';
$sth = $dbh->query($sql); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC);  
foreach ($result as $row){ 
echo '<tbody>';
echo '<tr>';
      echo '<td>'; echo  $row['NumPrestation'];  echo '</td>';
      echo '<td>'; echo '<input type="text" name="Nomtype" value = "'.$row['Nomtype'].'">'; echo '</td>';
      echo '<td>'; echo '<input type="text" name="NomMat" value = "'.$row['NomMat'].'">'; echo '</td>';
      echo '<td>'; echo '<input type="number" step="any" name="Prix" value = "'.$row['Prix'].'">'; echo '</td>';
  }
  echo '<input type=hidden name=NumPrestation value='.$_POST['NumPrestation'].'>' 
?>
    </tr>
    </tbody>
    </Table>
    <br>
    <div class="ml-auto" style="width:50px;">
    <button type="submit" class="btn btn-primary mb-2">Modifier</button>
</div>
</form>
<br> <br> <br>
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>