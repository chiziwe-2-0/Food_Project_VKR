<!DOCTYPE html>
<html>
<head>
<title>Zayavki</title>
<style>
.margin {
margin-left: 70%;
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<p><h1 align='center'>Zayavki</h1></p>
<?php
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error! " . mysqli_error($link)); 
     
$query = "SELECT zayavki.id_zayavki, tipy.name_tipa, klienty.id_klienta, klienty.name_klienta, zayavki.kolvo_porci
FROM tipy INNER JOIN (klienty INNER JOIN zayavki ON klienty.id_klienta = zayavki.id_klienta) ON tipy.id_tipa = zayavki.id_tipa";

 
$result = mysqli_query($link, $query) or die("Error of query! " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table align='center' border=1px><tr><th>id_zayavki</th><th>name_tipa</th><th>id_klienta</th><th>name_klienta</th><th>kolvo_porci</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 5 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
	echo "<br>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>
<form method="GET" action="zayavkiadd.php">
<p class='margin'><input type="submit" value="Add"></p>
</form>

<form method="GET" action="zayavkidel.php">
<p class='margin'><input type="submit" value="Delete"></p>
</form>
<p align='center'><a href="index.php">Main</a></p>
</p>
</body>
</html>