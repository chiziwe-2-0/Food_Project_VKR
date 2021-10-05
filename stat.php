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
<form method="GET">
<p align='center'>Nachalo perioda:
<input type="text" name="data1" />
Konec perioda:
<input type="text" name="data2" />
<input type="submit" value="Confirm">
<?php
session_start();
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error! " . mysqli_error($link)); 
if(isset($_GET['data1']) && ($_GET['data2'])){ 
     
    // экранирования символов для mysql
    $data1 = htmlentities(mysqli_real_escape_string($link, $_GET['data1']));
	$data2 = htmlentities(mysqli_real_escape_string($link, $_GET['data2']));
	$_SESSION['data1'] = $data1;
	$_SESSION['data2'] = $data2;
	echo "Ok </p>";
}
mysqli_close($link);
?>

</form>
<form method="GET" action="statdata.php">
	<p align='center'><input type="submit" value="Show statistics for this date"></p>
</form>
<form method="GET" action="statall.php">
	<p align='center'><input type="submit" value="Show statistics for all time"></p>
</form>
<p align='center'><a href="index.php">Main</a></p>
</body>
</html>