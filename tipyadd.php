<!DOCTYPE html>
<html>
<head>
<title>Tipy</title>
<style>
.margin {
margin-left: 70%;
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<p><h2 align='center'>Novyi tip</h2></p>
<form method="GET">
<p align='center'>Name tipa:<br> 
<input type="text" name="nametipa" /></p>
<p class='margin'><input type="submit" value="Add">
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_GET['nametipa'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $nametipa = htmlentities(mysqli_real_escape_string($link, $_GET['nametipa']));
	
	
    // создание строки запроса
    $query ="INSERT INTO tipy(id_tipa, name_tipa) VALUES(NULL, '$nametipa')";
     
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
<form action="tipy.php">
	<p class='margin'><input type="submit" value="View"></p>
</form>
<p align='center'><a href="index.php">Main</a></p>

</body>
</html>