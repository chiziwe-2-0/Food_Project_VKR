<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Eda</title>
<meta charset="utf-8">
</head>
<body>
<p><h1 align="center">Eda</h1></p>
<?php
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error! " . mysqli_error($link));
mysqli_close($link);
?>
<form method="GET" action="bluda.php">
<p align="center"><input type="submit" value="Bluda"></p>
</form>

<form method="GET" action="kat.php">
<p align="center"><input type="submit" value="Kategorii"></p>
</form>

<form method="GET" action="klienty.php">
<p align="center"><input type="submit" value="Klienty"></p>
</form>

<form method="GET" action="tipy.php">
<p align="center"><input type="submit" value="Tipy"></p>
</form>

<form method="GET" action="zayavki.php">
<p align="center"><input type="submit" value="Zayavki"></p>
</form>

<form method="GET" action="menu.php">
<p align="center"><input type="submit" value="Menu"></p>
</form>

<form method="GET" action="specif.php">
<p align="center"><input type="submit" value="Specifikacia"></p>
</form>

<form method="GET" action="stat.php">
<p align="center"><input type="submit" value="Statistika"></p>
</form>

</body>
</html>