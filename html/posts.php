<!DOCTYPE html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');

$link = mysqli_connect(
                            getenv('DB_HOST') ?: 'db',
                            getenv('DB_USER') ?: 'root',
                            getenv('DB_PASSWORD') ?: 'admin',
                            getenv('DB_NAME') ?: 'mysql'
                        );

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);

$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
$pic_link = "upload/" . $rows['pic_link'];

?>

<html>
<body>

<?php
echo "<h1> $title </h1>";
echo "<p> $main_text <p>";
echo "<img src=$pic_link></img>";
?>

</body>
</html>
