<!DOCTYPE html>
<html>
<head>
<title>Kategorii</title>
<style>
.margin {
margin-left: 70%;
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<p><h2 align='center'>Novaya  kategoria</h2></p>
<form method="GET">
<p align='center'>Name kategorii:<br> 
<input type="text" name="namekat" /></p>
<p align='center'>Edinica izmereniya:<br> 
<select name='edizm'>
	<option value = 'g'>g</option>
	<option value = 'ml'>ml</option>
</select></p>
<p class='margin'><input type="submit" value="Add">
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_GET['namekat']) && isset($_GET['edizm'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $namekat = htmlentities(mysqli_real_escape_string($link, $_GET['namekat']));
    $edizm = htmlentities(mysqli_real_escape_string($link, $_GET['edizm']));
	
	
    // создание строки запроса
    $query ="INSERT INTO kat(id_kat, name_kat, ed_izm) VALUES(NULL, '$namekat','$edizm')";
     
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
<form action="kat.php">
	<p class='margin'><input type="submit" value="View"></p>
</form>
<p align='center'><a href="index.php">Main</a></p>
</body>
</html>