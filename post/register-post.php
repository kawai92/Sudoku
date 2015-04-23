<?php
$login = false;
require_once "../game.inc.php";

unset($_SESSION['newuser-error']);

if($_POST['secret'] !== "super477") {
    $_SESSION['newuser-error'] = "Invalid secret!";
    header("location: ../register.php");
    exit;
}

$nu = new NewUsers($site);
$msg = $nu->newUser(
    strip_tags($_POST['userid']),
    strip_tags($_POST['name']),
    strip_tags($_POST['email']),
    strip_tags($_POST['password1']),
    strip_tags($_POST['password2']),
    new Email());

if($msg !== null) {
    $_SESSION['newuser-error'] = $msg;
    header("location: ../register.php");
    exit;
}

header("location: ../validating.php");
exit;