<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2/17/2015
 * Time: 8:12 PM
 */
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
<p><b>Input an answer (1-9) into the cell you selected:</b></p>
    <form method="post" action="game-post.php">
        <p>
            <input type="text" name="value" id="value">
            <input type="submit">
        </p>
    </form>
    <p class="note">(Enter 0 to clear the cell)</p>

<p><b>Input a clue value (1-9) into the cell you selected:</b></p>
    <form method="post" action="game-post.php">
        <p>
            <input type="text" name="clue" id="clue">
            <input type="submit">
        </p>
    </form>
</div>

<p class="general">
    <img src="img/game100.png">
</p>

<br>

</body>
</html>