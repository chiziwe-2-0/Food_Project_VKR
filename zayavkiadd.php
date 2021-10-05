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
<p><h2 align='center'>Novaya  zayavka</h2></p>
<form method="GET">
<p align='center'>Tip:<br> 
<select name='idtip'>
<?php
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database); 
$query ="SELECT id_tipa, name_tipa FROM tipy";
$result = mysqli_query($link, $query);
while($row = mysqli_fetch_object($result)) {
	echo "<option value = ".$row->id_tipa.">".$row->name_tipa."</option>";
}
 ?>
</select></p>

<p align='center'>Klient:<br> 
<select name='idklienta'>
<?php
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database); 
$query ="SELECT id_klienta, name_klienta FROM klienty";
$result = mysqli_query($link, $query);
while($row = mysqli_fetch_object($result)) {
	echo "<option value = ".$row->id_klienta.">".$row->name_klienta."</option>";
}
 ?>
</select></p>
<p align='center'>Kolvo porci:<br> 
<input type="text" name="kolvo" /></p>

<p class='margin'><input type="submit" value="Add">
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_GET['idtip']) && isset($_GET['idklienta']) && isset($_GET['kolvo'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $idtip = htmlentities(mysqli_real_escape_string($link, $_GET['idtip']));
    $idklienta = htmlentities(mysqli_real_escape_string($link, $_GET['idklienta']));
	$kolvo = htmlentities(mysqli_real_escape_string($link, $_GET['kolvo']));
	
	
    // создание строки запроса
    $query ="INSERT INTO zayavki(id_zayavki, id_tipa, id_klienta, kolvo_porci) VALUES(NULL, '$idtip','$idklienta','$kolvo')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Error of query! " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:black;'>Ok</span>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>

</form>
<form action="zayavki.php">
	<p class='margin'><input type="submit" value="View"></p>
</form>
<p align='center'><a href="index.php">Main</a></p>
</body>
</html>