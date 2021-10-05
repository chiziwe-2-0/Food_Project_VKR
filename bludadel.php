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
<p><h2 align="center">Udalit  bludo</h2></p>
<form method="GET">
<p align="center">ID bluda:<br> 
<input type="text" name="idbluda" /></p>
<p class="margin"><input type="submit" value="Delete">
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_GET['idbluda'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $idbluda = htmlentities(mysqli_real_escape_string($link, $_GET['idbluda']));
	
	
    // создание строки запроса
    $query ="DELETE FROM bluda WHERE id_bluda = '$idbluda'";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Error of query! " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:black;'>Ok</span>";
		echo "</p>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>

</form>
<form action="bluda.php">
	<p class="margin"><input type="submit" value="View"></p>
</form>
<p align="center"><a href="index.php">Main</a></p>
</body>
</html>