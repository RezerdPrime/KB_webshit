<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$link = mysqli_connect('127.0.0.1', 'root', 'rez');
if (!$link) {
	die('Error:' . mysqli_error());
}
echo '<p style="color:red">Иди нахуй</p>';
mysqli_close($link);
?>
