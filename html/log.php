<?php
// Включим буферизацию на всякий случай
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');

// Проверка куки и редирект — ДО любого HTML!
if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
    exit; // Обязательно завершаем скрипт
}

$link = mysqli_connect('db', 'root', 'admin', 'mysql');

if (isset($_POST['submit'])) {
    $username = $_POST['login'];
    $pass = $_POST['password'];

    if (empty($username) || empty($pass)) {
        $error = "Уебан правильно форму заполняй";
    } else {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            setcookie("User", $username, time() + 60, '/');
            header("Location: profile.php");
            exit;
        } else {
            $error = "Не правильное имя или пароль";
        }
    }
}

// Очищаем буфер и начинаем вывод HTML
ob_end_clean();
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    <p>Логинься нахуй</p>
    <form method="POST">
        <input type="text" name="login" placeholder="логин">
        <input type="password" name="password" placeholder="пароль">
        <button type="submit" name="submit">Двигай дальше</button>
    </form>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</body>
</html>
