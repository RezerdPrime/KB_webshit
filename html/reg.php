<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p>Регайся нахуй</p>
		<form method="POST" action="reg.php">
			<input type="email" name="email" placeholder="ебеил">
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
	header("Location: log.php");
}

$link = mysqli_connect(
                            getenv('DB_HOST') ?: 'db',
                            getenv('DB_USER') ?: 'root',
                            getenv('DB_PASSWORD') ?: 'admin',
                            getenv('DB_NAME') ?: 'mysql'
                        );

if (isset($_POST['submit'])) {

	$email = $_POST['email'];
	$username = $_POST['login'];
	$pass = $_POST['password'];

	if (!$email || !$username || !$pass) die("<p style='color:red'>Уебан правильно форму заполняй</p>");

	$sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$pass')";

	if (!mysqli_query($link, $sql)){
		echo "Skill issue";
	}

}

?>
