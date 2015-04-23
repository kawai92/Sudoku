<?php
$login = true;
require '../game.inc.php';

if(isset($_POST['user']) && isset($_POST['password'])) {
    $users = new Users($site);

    $user = $users->login($_POST['user'], $_POST['password']);
    echo $user->getName();
    if($user !== null) {
        $_SESSION['user'] = $user;
        $_SESSION['name'] = $user->getName();
        header("location: ../game-post.php");
        exit;
    }
}


header("location: ../login.php");