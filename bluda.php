<!DOCTYPE html>
<html>
<head>
<title>Bluda</title>
<style>
.margin {
margin-left: 70%;
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<p><h1 align="center">Bluda</h1></p>
<?php
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error! " . mysqli_error($link)); 
     
$query = "SELECT bluda.id_bluda, bluda.id_kat, kat.name_kat, bluda.name_bluda, bluda.vyhod_bluda, kat.ed_izm
FROM kat INNER JOIN bluda ON kat.id_kat = bluda.id_kat";

 
$result = mysqli_query($link, $query) or die("Error of query! " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table align='center' border=1px><tr><th> id_bluda</th><th>id_kat</th><th>name_kat</th><th>name_bluda</th><th>vyhod_bluda</th><th>ed_izm</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 6 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
	echo "<br>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>
<form method="GET" action="bludaadd.php">
<p class="margin"><input type="submit" value="Add"></p>
</form>

<form method="GET" action="bludadel.php">
<p class="margin"><input type="submit" value="Delete"></p>
</form>

<p align="center"><a href="index.php">Main</a></p>

</body>
</html>