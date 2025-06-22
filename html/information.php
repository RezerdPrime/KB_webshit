<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$link = mysqli_connect(
                            getenv('DB_HOST') ?: 'db',
                            getenv('DB_USER') ?: 'root',
                            getenv('DB_PASSWORD') ?: 'admin',
                            getenv('DB_NAME') ?: 'mysql'
                        );
if (!$link) {
	die('Error:' . mysqli_error());
}
echo '<p style="color:red">Иди нахуй</p>';
mysqli_close($link);
?>
