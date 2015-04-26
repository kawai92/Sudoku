<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 2/25/15
 * Time: 7:49 PM
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

<div class="general">
    <br>
        <?php echo $view->presentPlayer();?>
    <br>
    <?php echo $view->presentTable(); ?>
    <br>
    <p><b><a href="game-post.php?g=1">Give up!</a></b></p>
    <br>
    <p><b><a href = "post/save-post.php" > Save Current Game </a ></b ></p >
    <p><b><a href = "load-post.php" > Load Previous Game </a></b></p>
</div>
</body>
</html>