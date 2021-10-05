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
<p><h2 align="center">Novoe  bludo</h2></p>
<form method="GET">
<p align="center">Kategoria:<br> 
<select name='idkat'>
<?php
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database); 
$query ="SELECT id_kat, name_kat FROM kat";
$result = mysqli_query($link, $query);
while($row = mysqli_fetch_object($result)) {
	echo "<option value = ".$row->id_kat.">".$row->name_kat."</option>";
}
 ?>
</select></p>


<p align="center">Name bluda:<br> 
<input type="text" name="namebluda" /></p>
<p align="center">Vyhod bluda:<br> 
<input type="text" name="vyhodbluda" /></p>
<p class="margin"><input type="submit" value="Add">
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_GET['idkat']) && isset($_GET['namebluda']) && isset($_GET['vyhodbluda'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $idkat = htmlentities(mysqli_real_escape_string($link, $_GET['idkat']));
    $namebluda = htmlentities(mysqli_real_escape_string($link, $_GET['namebluda']));
	$vyhodbluda = htmlentities(mysqli_real_escape_string($link, $_GET['vyhodbluda']));
	
	
    // создание строки запроса
    $query ="INSERT INTO bluda(id_bluda, id_kat, name_bluda, vyhod_bluda) VALUES(NULL, '$idkat','$namebluda','$vyhodbluda')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Error of query! " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:black;'>Ok</span></p>";
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