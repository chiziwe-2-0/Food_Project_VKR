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
<p><h2 align='center'>Klienty</h2></p>
<?php
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error! " . mysqli_error($link)); 
     
$query = "SELECT * FROM klienty";

 
$result = mysqli_query($link, $query) or die("Error of query! " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table align='center' border=1px><tr><th>id_klienta</th><th>name_klienta</th><th>address</th><th>tel</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
	echo "<br>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>
<form method="GET" action="klientadd.php">
<p class='margin'><input type="submit" value="Add"></p>
</form>

<form method="GET" action="klientdel.php">
<p class='margin'><input type="submit" value="Delete"></p>
</form>
<p align='center'><a href="index.php">Main</a></p>
</p>
</body>
</html>