<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p>Логинься нахуй</p>
		<form method="POST" action="log.php">
			<input type="text" name="login" placeholder="логин">
			<input type="password" name="password" placeholder="пароль">
			<button type="submit" name="submit">Двигай дальше</button>
		</form>
	</body>
</html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');

if (isset($_COOKIE['User'])) {
	header("Location: profile.php");
}

$link = mysqli_connect('127.0.0.1', 'rezerdprime', 'rez', 'mysql');

if (isset($_POST['submit'])) {

	$username = $_POST['login'];
	$pass = $_POST['password'];

	if (!$username || !$pass) die("<p style='color:red'>Уебан правильно форму заполняй</p>");

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";

	$result = mysqli_query($link, $sql);
	
	if (mysqli_num_rows($result) == 1) {
	  setcookie("User", $username, time()+60);
	  header('Location: profile.php');
	} else {
	  echo "не правильное имя или пароль";
	}

}

?>
