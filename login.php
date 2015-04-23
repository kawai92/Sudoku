<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 4/21/15
 * Time: 9:54 PM
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
<div id="login">
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
    <a href="register.php">New User</a>
    <a href="./">Back</a>
</div>
<br>
</body>
</html>