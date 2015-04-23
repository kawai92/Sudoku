<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 2/26/15
 * Time: 12:40 AM
 */

require 'game.inc.php';

$controller = new SudokuController($sudoku, $_REQUEST);
if($controller->isReset())
{
    unset($_SESSION[SUDOKU_SESSION]);
}

header('Location: ' . $controller->getPage());