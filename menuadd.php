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
<p><h2 align='center'>Novoye menu</h2></p>
<form method="GET">
<p align='center'>Bludo:<br> 
<select name='idbluda'>
<?php
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database); 
$query ="SELECT id_bluda, name_bluda FROM bluda";
$result = mysqli_query($link, $query);
while($row = mysqli_fetch_object($result)) {
	echo "<option value = ".$row->id_bluda.">".$row->name_bluda."</option>";
}
 ?>
</select></p>

<p align='center'>Skolko gotovit:<br> 
<input type="text" name="skolko" /></p>
<p class='margin'><input type="submit" value="Add">
<?php
session_start();
$iddaty = $_SESSION['iddaty'];
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_GET['idbluda']) && isset($_GET['skolko'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $idbluda = htmlentities(mysqli_real_escape_string($link, $_GET['idbluda']));
	$skolko = htmlentities(mysqli_real_escape_string($link, $_GET['skolko']));
	
	
    // создание строки запроса
    $query ="INSERT INTO menu(id_stroki, id_bluda, id_daty, skolko_gotovit) VALUES(NULL, '$idbluda','$iddaty','$skolko')";
     
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
<p align='center'><a href="index.php">Main</a></p>
</body>
</html>
