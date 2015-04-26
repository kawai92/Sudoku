<?php
$login = false;
require_once "game.inc.php";
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
<div id="login">
    <h2>Validation</h2>
    <p>Email has been sent to you for validation. Please click on the validation link before you try to log in.</p>
    <a href="./">Go to Login Page</a>
</div>
<br>
</body>
</html