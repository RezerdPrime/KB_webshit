<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="r.webp" type="image/x-icon">
    </head>

    <body>
	<?php
		echo "У самурая есть только пупупу";
		if (!isset($_COOKIE['User'])){
	 ?>
			<p><a href="/reg.php"> Вилкой в глаз </a> или <a href="/log.php"> ты уже смешарик </a></p>
	<?php 
		
		} else {
			echo "<br><br><a href='/profile.php'>Ты уже смешарик, соболезную</a></br></br>";
		}
	?>
    </body>
</html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');

$link = mysqli_connect('db', 'root', 'admin', 'mysql');

$sql = "SELECT * FROM posts";
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) >  0) {
            while ($post = mysqli_fetch_array($res)) {
                echo "<hr><a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a></hr>\n";
            }
           } else {
                echo "<p>Плохо работаете, срите лучше</p>";
           }

?>
