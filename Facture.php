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
    echo '<br>';

        include_once('connect.php');
        $sql =  'SELECT MAX(idFacture) as "idFacture" FROM Facture';
        $sth = $dbh->query($sql); 
        $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($result as $row){ 
        $max = $row['idFacture'];
            }
            $max++;
        ?>
    <?php
       include_once('connect.php');
       $sql =  'SELECT NumLigue FROM ligue WHERE sport = "'.$_POST['Sport'].'"';
       $sth = $dbh->query($sql); 
       $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
       foreach ($result as $row){ 
       $NumLigue = $row['NumLigue'];
           }
       ?>
    
    <?php
    $DateDeb = date('Y-m-d');
    $jour = date('d');
    if ($jour >= 25) {
        $DateEcheance = date('Y-m-t',strtotime('+1 month'));
    }
    else {
        $DateEcheance = date('Y-m-t');
    }
    $sql='Insert Into Facture Values ('.$max.','.$NumLigue.',"'.$DateDeb.'","'.$DateEcheance.'");';
    $sth = $dbh->query($sql);
    ?>
    <?php
        $i = 0;
        $t = 0;
        include_once('Connect.php'); 
        $sql =  'SELECT Nomtype FROM prestations';
        $sth = $dbh->query($sql); 
        $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($result as $row) {
            $Qte[$i] = $_POST[''.$row['Nomtype'].''];
            $i++;
            $t++;          
        }
        ?>
            <?php
        $i = 0;
        $t = 0;
        include_once('Connect.php'); 
        $sql =  'SELECT Nomtype FROM prestations';
        $sth = $dbh->query($sql); 
        $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($result as $row) {
            $NomType[$i] = $row['Nomtype'];
            $i++;
            $t++;          
        }
        ?>
        <?php
        include_once('Connect.php'); 
        for ($i=0; $i < $t; $i++) { 
       $sql='Insert Into ContenuFacture Values ('.$max.',"'.$NomType[$i].'",'.$Qte[$i].')';   
       $sth = $dbh->query($sql);          
       }    
        ?>
        <form name="VoirFactureExe" action="VoirFactureExe.php" method="post">
        <?php echo '<input type="hidden" name="idFacture" value='.$max.'>';?>
         <script> setTimeout("document.forms['VoirFactureExe'].submit()", 0); </script>
        </form>
        
<br> <br> <br>
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>