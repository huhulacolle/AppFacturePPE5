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
    <br>
    <center> <h4> <strong> Facture </strong> </h4> <h7> Selectionner la facture à afficher </h7>  </center> <br>

    <div class="mx-auto" style="width: 500px;">
    <form action="VoirFactureExe.php" method="post">
    <Table class="table-borderess">
    <tbody>
    <?php
        include_once('Connect.php'); 
        $sql =  'SELECT idFacture, NomSport, DateDeb, DateEcheance FROM Ligue, Facture WHERE ligue.NumLigue = Facture.NumLigue;';
        $sth = $dbh->query($sql); 
        $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
        if ($result == NULL) {
            echo " <br> <h5> <center> Aucune facture n'a été créée </center> </h5>";
        }
        foreach ($result as $row) {
            echo '<tr>'; 
            echo '<td>'; echo 'Facture N°'; echo $row['idFacture'] ; echo '</td>';
            echo '<td>';
            echo '<button type="submit" name="idFacture" value="'.$row['idFacture'].'" class="btn btn-link">'.$row['NomSport'].' : '.$row['DateDeb'].' - '.$row['DateEcheance'].' </button>';
            echo '</tr>';
        }
        $dbh=NULL;
    ?>
    </tbody>  
    </Table>       

<br> <br> <br>
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>