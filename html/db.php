<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = "root";
$password = "admin";
$dbName = "mysql";

$link = mysqli_connect('db', 'root', 'admin', 'mysql');

if (!$link) {
  die("Ошибка подключения: " . mysqli_connection_error());
}
echo "Если ты это видишь, значит бд подключилась без проблем";

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link, $sql)) {
  echo "Не удалось создать БД";
}

mysqli_close($link);
$link = mysqli_connect(
    getenv('DB_HOST') ?: 'db',
    getenv('DB_USER') ?: 'root',
    getenv('DB_PASSWORD') ?: 'admin',
    getenv('DB_NAME') ?: 'mysql'
);

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
  main_text VARCHAR(400) NOT NULL,
  pic_link VARCHAR(50) NULL
)";

if (!mysqli_query($link, $sql)){
  echo "Ебанат";
}

mysqli_close($link);

?>
