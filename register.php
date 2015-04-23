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
    <h2>New User</h2>
    <form method="post" action="post/newuser-post.php">
        <p>
            <label for="userid">User ID:</label><br>
            <input type="text" id="userid" name="userid"></p>
        <p>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"></p>
        <p>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"></p>
        <p>
            <label for="password1">Password:</label><br>
            <input type="password" id="password1" name="password1"></p>
        <p>
            <label for="password2">Password:</label><br>
            <input type="password" id="password2" name="password2"></p>
        <p>
            <label for="secret">Secret:</label><br>
            <input type="password" id="secret" name="secret">
            <?php
            if(isset($_SESSION['newuser-error'])) {
                echo "<p>" . $_SESSION['newuser-error'] . "</p>";
                unset($_SESSION['newuser-error']);
            }
            ?>
        </p>
        <p><input type="submit"></p>
    </form>
    <a href="./">Back</a>
</div>
<br>
</body>
</html>