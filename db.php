<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username = "rezerdprime";
$password = "rez";
$dbName = "mysql";

$link = mysqli_connect($servername, $username, $password);
if (!$link) {
  die("Ошибка подключения: " . mysqli_connection_error());
}
echo "Если ты это видишь, значит бд подключилась без проблем";

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link, $sql)) {
  echo "Не удалось создать БД";
}

mysqli_close($link);
$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
  id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(15) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(20) NOT NULL
)";

if (!mysqli_query($link, $sql)){
  echo "Ебанат";
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(20) NOT NULL,
  main_text VARCHAR(400) NOT NULL
)";

if (!mysqli_query($link, $sql)){
  echo "Ебанат";
}

mysqli_close($link);

?>
