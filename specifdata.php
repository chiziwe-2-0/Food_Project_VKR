<!DOCTYPE html>
<html>
<head>
<title>Specif</title>
<style>
.margin {
margin-left: 70%;
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<p><h2 align='center'>Specif</h2></p>
<form method="GET">
<p align='center'>ID klienta:<br> 
<input type="text" name="idklienta" /></p>
<p class='margin'><input type="submit" value="View"></p>
<?php
session_start();
$iddaty = $_SESSION['iddaty'];
if (isset($_GET['idklienta'])){
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error! " . mysqli_error($link)); 
	
$idklienta = htmlentities(mysqli_real_escape_string($link, $_GET['idklienta']));
     
$query = "SELECT data.data, klienty.id_klienta, klienty.name_klienta, tipy.name_tipa, zayavki.kolvo_porci, bluda.name_bluda, kat.name_kat, bluda.vyhod_bluda, kat.ed_izm
FROM tipy INNER JOIN ((kat INNER JOIN (data INNER JOIN (bluda INNER JOIN menu ON bluda.id_bluda = menu.id_bluda) ON data.id_daty = menu.id_daty) ON kat.id_kat = bluda.id_kat) INNER JOIN ((klienty INNER JOIN zayavki ON klienty.id_klienta = zayavki.id_klienta) INNER JOIN specif ON zayavki.id_zayavki = specif.id_zayavki) ON menu.id_stroki = specif.id_stroki) ON tipy.id_tipa = zayavki.id_tipa
WHERE (data.id_daty LIKE '$iddaty') AND (klienty.id_klienta LIKE '$idklienta')";


 
$result = mysqli_query($link, $query) or die("Error of query! " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table align='center' border=1px><tr><th>data</th><th>id_klienta</th><th>name_klienta</th><th>name_tipa</th><th>kolvo_porci</th><th>name_bluda</th><th>name_kat</th><th>vyhod_bluda</th><th>ed_izm</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 9 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
	echo "</br>";
     
    // очищаем результат
    mysqli_free_result($result);
}

mysqli_close($link);
}
?>
<p align='center'><a href="index.php">Main</a></p>
</form>
</body>
</html>