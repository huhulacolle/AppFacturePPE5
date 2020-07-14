<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>crosl</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <form action="ModifLigueExe.php" method="post">
    <?php
    include_once('nav.php');
    ?>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link active" href="LigueModif.php">Retour</a>
      </li>
    </ul>
    <br>
    <div class="mx-auto" style="width: 1000px;">
      <h1 class="small">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col"> NumLigue </th>
              <th scope="col"> NomSport </th>
              <th scope="col"> Nom</th>
              <th scope="col"> Adresse</th>
              <th scope="col"> Ville</th>
              <th scope="col"> CodePostal</th>
              <th scope="col"> Sport </th>
            </tr>
          </thead>
          <?php
include_once('Connect.php'); 
$sql =  'SELECT * FROM LIGUE WHERE NumLigue = '.$_POST['NumLigue'].'';
$sth = $dbh->query($sql); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC);  
foreach ($result as $row){ 
$FinNomSport = explode(" ", $row['NomSport']);
$NomSport = end($FinNomSport);
echo '<tbody>';
echo '<tr>';
      echo '<td>'; echo  $row['NumLigue'];  echo '</td>';
      echo '<td>'; echo 'Ligue Loraine de ' ; echo'<input type="text" name="NomSport" value = "'.$NomSport.'">';  ; echo '</td>';
      echo '<td>'; echo '<input type="text" name="Nom" value = "'. $row['Nom'].'">'; echo '</td>';
      echo '<td>'; echo '<input type="text" name="Addrs" value = "'. $row['Addrs'].'">'; echo '</td>';
      echo '<td>'; echo '<input type="text" name="Ville" value = "'. $row['Ville'].'">'; echo '</td>';
      echo '<td>'; echo '<input type="number" name="CodPost" value = "'. $row['CodPost'].'">'; echo '</td>';
      echo '<td>'; echo '<input type="text" name="Sport" value = "'. $row['Sport'].'">'; echo '</td>';
  }
  echo '<input type=hidden name=NumLigue2 value='.$_POST['NumLigue'].'>' 
?>
          </tr>
          </tbody>
        </Table>
      </h1>
      <br>
      <div class="ml-auto" style="width:50px;">
        <button type="submit" class="btn btn-primary mb-2">Modifier</button>
      </div>
  </form>
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