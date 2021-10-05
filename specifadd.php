<!DOCTYPE html>
<html>
<head>
<title>Specif</title>
<style>
.margin {
margin-left: 70%;
}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<p><h2 align='center'>Sozdat specif</h2></p>

<?php
require_once 'connection.php'; // подключаем скрипт
session_start();
$iddaty = $_SESSION['iddaty'];
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error! " . mysqli_error($link)); 
     
$query = "SELECT menu.id_stroki, data.data, bluda.name_bluda, kat.name_kat, bluda.vyhod_bluda, kat.ed_izm, menu.skolko_gotovit
FROM kat INNER JOIN (data INNER JOIN (bluda INNER JOIN menu ON bluda.id_bluda = menu.id_bluda) ON data.id_daty = menu.id_daty) ON kat.id_kat = bluda.id_kat
WHERE (data.id_daty LIKE '$iddaty')";

 
$result = mysqli_query($link, $query) or die("Error of query! " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    echo "<p align='center'>Menu for this date:</p>";
    echo "<table align='center' border=1px><tr><th>is_stroki</th><th>data</th><th>name_bluda</th><th>name_kat</th><th>vyhod_bluda</th><th>ed_izm</th><th>skolko_gotovit</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
	echo "</br>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>
<form method="GET">
<p align='center'>ID zayavki:<br> 
<input type="text" name="idzayavki" /></p>
<p align='center'>ID stroki:<br> 
<input type="text" name="idstroki" /></p>
<p class='margin'><input type="submit" value="Add">
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_GET['idzayavki']) && isset($_GET['idstroki'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database); 
     
    // экранирования символов для mysql
    $idzayavki = htmlentities(mysqli_real_escape_string($link, $_GET['idzayavki']));
    $idstroki = htmlentities(mysqli_real_escape_string($link, $_GET['idstroki']));
	
	
    // создание строки запроса
    $query2 ="INSERT INTO specif(id_zapisi, id_zayavki, id_stroki) VALUES(NULL, '$idzayavki','$idstroki')";
     
    // выполняем запрос
    $result2 = mysqli_query($link, $query2) or die("Error of query! " . mysqli_error($link)); 
    if($result2)
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