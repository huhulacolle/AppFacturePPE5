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
    echo '<br>';
    echo "<center> <h4> <strong> Nouvelle Facture </strong> </h4>  </center> <br>";
    echo '<div class="mx-auto" style="width: 500px;">';
    ?>
  <form action="Facture.php" method="post">
    <table class="table table-borderless">
      <thead>
        <tr>
          <td>
            <div class="form-group">
              <select class="form-control" name="Sport">
                <?php
       include_once('Connect.php'); 
       $sql =  'SELECT Sport FROM LIGUE';
       $sth = $dbh->query($sql); 
       $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
       foreach ($result as $row) {
         echo '<option>'; echo $row['Sport'];  echo '</option>';
       }
  ?>
              </select>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="col"> Désignation </th>
          <th scope="col"> Quantité </th>
          <th scope="col"> Prix </th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once('Connect.php'); 
        $sql =  'SELECT Nomtype, NomMat, Prix FROM prestations';
        $sth = $dbh->query($sql); 
        $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' ; echo  $row['NomMat'] ; echo  '</td>';
            ?>
        <td>
          <div class="form-group">
            <?php
            echo '<select class="form-control" name="'.$row['Nomtype'].'">';
            for ($i=0; $i <= 999 ; $i++) { 
              echo "<option>";
              echo $i;
              echo "</option>";
            }
            echo '<td>' ; echo $row['Prix']; echo '€'; echo '</td>';
            echo '</tr>';
        }
        $dbh=NULL; 
    ?>
      </tbody>
    </table>
    <div class="ml-auto" style="width:0px;">
      <button type="submit" class="btn btn-primary mb-2">Valider</button>
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