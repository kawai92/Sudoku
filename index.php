<?php
require 'game.inc.php';
require 'format.inc.php';
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Super Sudoku</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header>
    <nav>
        <?php
            echo present_header();
        ?>
    </nav>

    <img src="img/super2-600.png" alt="Sudoku Banner" width="730" height="225">

</header>

<br>

<div class="general">
    <h2>Login</h2>
    <form method="post" action="post/login-post.php">
        <p>
            <label for="user">User name or Email:</label><br>
            <input type="text" id="user" name="user"></p>
        <p><label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
        </p>
        <p><input type="submit"></p>
    </form>
    <form method="post" action="game-post.php">
        <p>
            Play as a Guest:
            <input type="submit">
        </p>
    </form>
    <a href="register.php">New User</a>
</div>

<p class="general">
    <img src="img/gameR300.png">
</p>

<p class="general"><a href="game-post.php?cheat=1"><b>Cheat</b></a></p>
<br>

</body>
</html>