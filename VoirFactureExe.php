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
        function imprimer(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</head>

<body>
    <?php
include_once 'nav.php';
?>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="VoirFacture.php">Retour</a>
        </li>
    </ul>
    <br> <br>
    <div class="mx-auto" style="width: 800px;">
        <table class="table table-bordered">
            <tr>
                <td>
                    <div id='sectionAimprimer'>
                        <div class="mx-auto" style="width: 800px;">
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        <img src="style/mdl.png" height="150px" width="150px">
                                        <center>
                                            <h1> <strong> Facture </strong> </h1>
                                        </center>
                                        <br> <br> <br>
                                        <?php
include_once 'Connect.php';
$sql = 'SELECT NomSport, Nom, Addrs, Ville, CodPost, Sport FROM LIGUE, Facture WHERE LIGUE.NumLigue = Facture.NumLigue AND idFacture = ' . $_POST['idFacture'] . '';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo 'Maison Régionale des Sports de Lorraine ';
    echo '<br>';
    echo $row['Addrs'];
    echo '<br>';
    echo '<strong>';
    echo $row['CodPost'];
    echo ' ';
    echo $row['Ville'];
    echo '</strong>';
    echo '<br>';
    echo '<br>';
    echo '<div class="row mx-md-n5">';
    echo '<div class="col px-md-5"></div>';
    echo ' <div class="col px-md-5">';
    echo $row['NomSport'];
    echo '<br>';
    echo "à l'attention de ";
    echo $row['Nom'];
    echo '</div>';
}
?>
                                        <div class="mx-auto" style="width: 700px;">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td> Date </td>
                                                    <td> Code Client </td>
                                                    <td> N° Facture </td>
                                                    <td> Échéance </td>
                                                </tr>
                                                <tr>
                                                    <br> <br> <br>
                                                    <?php
include_once 'Connect.php';
$sql = 'SELECT idFacture, NumLigue, DateDeb, DateEcheance FROM Facture WHERE idFacture = ' . $_POST['idFacture'] . '';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo '<td>';
    echo $row['DateDeb'];
    echo '</td>';
    echo '<td>';
    echo $row['NumLigue'];
    echo '</td>';
    echo '<td>';
    echo "FC ";
    echo $row['idFacture'];
    echo '</td>';
    echo '<td>';
    echo $row['DateEcheance'];
    echo '</td>';
}
?>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="mx-auto" style="width: 700px;">
                                            <table class="table  ">
                                                <tr>
                                                    <th scope="col"> Référence </th>
                                                    <th scope="col"> Désignation </th>
                                                    <th scope="col"> Quantité </th>
                                                    <th scope="col"> PUHT </th>
                                                    <th scope="col"> Montant HT </th>
                                                </tr>
                                                <?php
$i = 0;
$t = 0;
include_once 'Connect.php';
$sql = 'SELECT ContenuFacture.NomType, NomMat, Qte, Prix FROM ContenuFacture, Facture, Prestations WHERE ContenuFacture.idFacture = Facture.idFacture AND ContenuFacture.NomType = Prestations.NomType AND Facture.idFacture = ' . $_POST['idFacture'] . '';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo '<tr>';
    echo '<td>';
    echo $row['NomType'];
    echo '</td>';
    echo '<td>';
    echo $row['NomMat'];
    echo '</td>';
    echo '<td>';
    echo $row['Qte'];
    echo '</td>';
    echo '<td>';
    echo $row['Prix'];
    echo '</td>';
    $total[$i] = $row['Prix'] * $row['Qte'];
    echo '<td>';
    echo $total[$i];
    echo '€';
    echo '</td>';
    echo '</tr>';
    $i++;
    $t++;

}
echo '</table>';
echo '</div>';
$HT = 0;
for ($i = 0; $i < $t; $i++) {
    $HT = $HT + $total[$i];
}
echo '<div class="ml-auto" style="width:200px;">';
echo '<br>';
echo '<h4> <strong> Total HT </strong> </h4>';
echo '<h5>';
echo $HT;
echo '€';
echo '</h5>';
echo '</div>';
?>

                                                <div class="mx-auto" style="width: 700px;">
                                                    <br> <br>
                                                    <h1 class="size">
                                                        Déclarée à la préfecture de Meurthe et Moselle N° 3898
                                                        <br> <br>
                                                        Domiciliation bancaire 10278 04065 000 166911045 05
                                                        <br> <br>
                                                        Merci de bien vouloir préciser les références de la facture
                                                        acquittée
                                                        <br> <br>
                                                        TVA non applicable
                                                        <br> <br> <br> <br>
                                                        Siret 31740105700029 <br> Tél <strong> 03.83.18.87.02 </strong>
                                                        <br> Fax 03.83.18.87.03
                                                    </h1>
                                                </div>
                                    </td>
                                </tr>
                </td>
            </tr>
        </table>
    </div>
    </div>
    </table>
    </div>
    <br>
    <div class="ml-auto" style="width:300px;">
        <button onClick="imprimer('sectionAimprimer')">Imprimer</button>
    </div>
    <br> <br> <br> <br>
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