<!DOCTYPE html>
<html>
<head>
<title>Menu</title>
<style>
.margin {
margin-left: 70%;
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<p><h2 align='center'>Menu</h2></p>
<form method="GET">
<p align='center'>Data:<br> 
<input type="text" name="data" />
<input type="submit" value="Confirm">
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
		echo "<span style='color:black;'>Ok, data yest. </span></p>";
	}
	else
	{		
    // создание строки запроса
    $query3 ="INSERT INTO data(id_daty, data) VALUES(NULL, '$data')";
    // выполняем запрос
    $result3 = mysqli_query($link, $query3) or die("Error of query! " . mysqli_error($link)); 
    if($result3)
    {
        echo "<span style='color:black;'>Ok</span></p>";
		$ses3 = mysqli_insert_id($link);
		$_SESSION['iddaty']=$ses3;
		//echo $_SESSION['iddaty'];
    }
	}
    // закрываем подключение
    mysqli_close($link);
}
?>
</form>
<form method="GET" action="menuadd.php">
	<p align='center'><input type="submit" value="New menu"></p>
</form>
<form method="GET" action="menudata.php">
	<p align='center'><input type="submit" value="Show menu for this date"></p>
</form>
<form method="GET" action="menuall.php">
	<p align='center'><input type="submit" value="Show menu for all time"></p>
</form>
<p align='center'><a href="index.php">Main</a></p>
</body>
</html>