<!DOCTYPE html>
<html>
<head>
<title>Klienty</title>
<style>
.margin {
margin-left: 70%;
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<p><h2 align='center'>Novyi klient</h2></p>
<form method="GET">
<p align='center'>Name klienta:<br> 
<input type="text" name="nameklienta" /></p>
<p align='center'>Address:<br> 
<input type="text" name="address" /></p>
<p align='center'>Telefon:<br> 
<input type="text" name="tel" /></p>
<p class='margin'><input type="submit" value="Add">
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_GET['nameklienta']) && isset($_GET['address']) && isset($_GET['tel'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $nameklienta = htmlentities(mysqli_real_escape_string($link, $_GET['nameklienta']));
    $address = htmlentities(mysqli_real_escape_string($link, $_GET['address']));
	$tel = htmlentities(mysqli_real_escape_string($link, $_GET['tel']));	
	
	
    // создание строки запроса
    $query ="INSERT INTO klienty(id_klienta, name_klienta, address, tel) VALUES(NULL, '$nameklienta','$address', '$tel')";
     
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
<form action="klienty.php">
	<p class='margin'><input type="submit" value="View"></p>
</form>
<p align='center'><a href="index.php">Main</a></p>
</body>
</html>