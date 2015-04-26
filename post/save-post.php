<?php
//phpinfo();
/**
 * Created by PhpStorm.
 * User: Aries
 * Date: 4/26/15
 * Time: 5:55 PM
 */
$login = true;
require '../game.inc.php';

$saveGame = new SaveGame($site);
$sudoku = $_SESSION[SUDOKU_SESSION];
$user = $_SESSION['user'];

if($user !== null) {
    $userID = $user->getId();
    $saveGame->saveGame($userID,$sudoku->getBoard(),$sudoku->getAnswer());
    $controller = new SudokuController($sudoku, $_REQUEST);
    if($controller->isReset())
    {
        unset($_SESSION[SUDOKU_SESSION]);
    }

    header('Location: ' . $controller->getPage());
    exit;
}
