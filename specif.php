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
<p align='center'>Data:<br> 
<input type="text" name="data" />
<input type="submit" value="Check date">
<?php
require_once 'connection.php'; // подключаем скрипт
session_start();
if(isset($_GET['data'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $data = htmlentities(mysqli_real_escape_string($link, $_GET['data']));
	$query1 ="SELECT data FROM data WHERE data LIKE '$data'";
	$result1 = mysqli_query($link, $query1); 
	$ses1 = mysqli_fetch_assoc($result1);
	if ($ses1 != NULL)
    {
        //echo "<span style='color:black;'>Data yest</span>";
		$query2 ="SELECT id_daty FROM data WHERE data LIKE '$data'";
		$result2 = mysqli_query($link, $query2);
		$ses2 = mysqli_fetch_assoc($result2);
		$_SESSION['iddaty']=$ses2['id_daty'];
		echo 'Ok';
		echo '</p>';		
	}
	else
	{		
	echo 'Menu na etu datu net!';
	}
    // закрываем подключение
    mysqli_close($link);
}
?>
</form>
<form method="GET" action="specifadd.php">
<p align='center'><input type="submit" value="Create specif for this date"></p>
</form>
<form method="GET" action="specifdata.php">
<p align='center'><input type="submit" value="Show specif for this date"></p>
</form>
<form method="GET" action="specifall.php">
<p align='center'><input type="submit" value="Show specif for all time"></p>
</form>
<p align='center'><a href="index.php">Main</a></p>
</body>
</html>