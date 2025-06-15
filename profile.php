<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="r.webp" type="image/x-icon">
    </head>

    <body style="
    background-color: rgb(32, 32, 32);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0;
    ">
        <div style="
        border-radius: 10px;
        background-color: rgb(255, 255, 255);
        width: 300px;
        height: 250px;
        justify-content: center;
        display: flex;
        margin-top: 10px;
            ">
        <img src="r.webp">
        </div>

        <button onclick="redir()" style="
        font-family: Verdana;
        width: 150px;
        border-radius: 10px;
        margin-top: 10px;
        "> 
            
            <?php
            $a = $_COOKIE['User'];
            if (isset($a)) {
            	echo "Иди нахуй, $a";	
	    } else {
	    	echo "Это пиздец";
	    }
            ?>
            
        </button>
        
        <script>
	  function redir() {
	    window.location.href = "index.php";
	  }
	</script>
        
        
	<form method="POST" action="profile.php" style="margin-top:50px">
		<div style="
		justify-content: center;
		flex-direction: column;
		display: flex;
		">
			<input type="text" name="title" placeholder="название говнопоста">
			<textarea name="text" placeholder="ну давай, сри"></textarea>
			<button type="submit" name="submit">засейвить</button>
		</div>
	</form>


    </body>
</html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'rezerdprime', 'rez', 'mysql');

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$main_text = $_POST['text'];
	
	if (!$title || !$main_text) die ("форму правильно заполняй мудак");
	
	$sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
	
	if (!mysqli_query($link, $sql)) die ("Skill issue");
}

?>
