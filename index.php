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
    <form method="post" action="game-post.php">
        <p>
            Play as a Guest:
            <input type="submit">
        </p>
    </form>
    <p><a href="register.php">Register</a></p>
    <p><a href="login.php">Login</a></p>
</div>

<p class="general">
    <img src="img/gameR300.png">
</p>

<p class="general"><a href="game-post.php?cheat=1"><b>Cheat</b></a></p>
<br>

</body>
</html>