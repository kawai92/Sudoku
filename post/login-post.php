<?php
$login = true;
require '../game.inc.php';

if(isset($_POST['user']) && isset($_POST['password'])) {
    $users = new Users($site);

    $user = $users->login($_POST['user'], $_POST['password']);
    echo $user->getName();
    if($user !== null)
    {
        $_REQUEST['user'] = $user;
        $_REQUEST['name'] = $user->getName();

        $controller = new SudokuController($sudoku, $_REQUEST);
        if($controller->isReset())
        {
            unset($_SESSION[SUDOKU_SESSION]);
        }
        $_SESSION['user'] = $user;
        header('Location: ../' . $controller->getPage());
        exit;
    }
}

header("location: ../login.php");