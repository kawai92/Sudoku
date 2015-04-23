<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 2/25/15
 * Time: 7:49 PM
 */
require 'game.inc.php';
require 'format.inc.php';
$view = new SudokuView($sudoku);
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

<div class="general">
    <br>
    <p class="general"><b>You have given up, here's the solution:</b></p>
    <br>
    <?php echo $view->presentAnswer(); ?>
    <br>
    <p><a href="index.php"><b>New Game</b></a></p>
    <br>
</div>


</body>
</html>