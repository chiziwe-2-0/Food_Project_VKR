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
<p><h2 align='center'>Udalit  zayavku</h2></p>
<form method="GET">
<p align='center'>ID zayavki:<br> 
<input type="text" name="idzayavki" /></p>
<p class='margin'><input type="submit" value="Delete">
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_GET['idzayavki'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $idzayavki = htmlentities(mysqli_real_escape_string($link, $_GET['idzayavki']));
	
	
    // создание строки запроса
    $query ="DELETE FROM zayavki WHERE id_zayavki = '$idzayavki'";
     
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