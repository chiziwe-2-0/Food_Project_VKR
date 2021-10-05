<!DOCTYPE html>
<html>
<head>
<title>Statistika</title>
<style>
.margin {
margin-left: 70%;
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<p><h2 align='center'>Statistika</h2></p>
<?php
session_start();
$data1 = $_SESSION['data1'];
$data2 = $_SESSION['data2'];

require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error! " . mysqli_error($link)); 
     
$query = "SELECT data.data, bluda.name_bluda, kat.name_kat, SUM(menu.skolko_gotovit) AS za_period
FROM kat INNER JOIN (data INNER JOIN (bluda INNER JOIN menu ON bluda.id_bluda = menu.id_bluda) ON data.id_daty = menu.id_daty) ON kat.id_kat = bluda.id_kat
GROUP BY data.data, bluda.name_bluda, kat.name_kat
HAVING (data.data >= '$data1') AND (data.data <= '$data2')";

 
$result = mysqli_query($link, $query) or die("Error of query! " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table align='center' border=1px><tr><th>data</th><th>name_bluda</th><th>name_kat</th><th>za_period</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
	echo "</br>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>
<p align='center'><a href="index.php">Main</a></p>
</p>
</body>
</html>