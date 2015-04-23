<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 2/25/15
 * Time: 9:03 PM
 */
require __DIR__ . "/autoload.inc.php";

$site = new Site();
$localize = require 'localize.inc.php';
if(is_callable($localize)) {
    $localize($site);
}

// Start the PHP session system
session_start();
define("SUDOKU_SESSION", 'sudoku');

$user = null;
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

// redirect if user is not logged in
/*if(!isset($login) && $user === null) {
    $root = $site->getRoot();
    header("location: $root");
    exit;
}
*/


$puzzles = array([[7,0,0,3,0,8,0,2,0],
                    [0,0,0,0,4,0,7,6,0],
                    [0,0,5,0,9,7,3,0,0],
                    [0,8,0,9,3,0,0,0,2],
                    [0,0,0,0,0,0,0,0,0],
                    [2,0,0,0,7,5,0,4,0],
                    [0,0,9,5,2,0,1,0,0],
                    [0,4,1,0,6,0,0,0,0],
                    [0,3,0,1,0,4,0,0,7]],
                 [[8,0,3,0,0,0,6,7,0],
                     [0,0,0,5,0,0,0,0,4],
                     [6,0,2,0,0,7,0,0,9],
                     [5,8,0,9,0,3,0,2,0],
                     [0,0,0,0,0,0,0,0,0],
                     [0,9,0,2,0,8,0,6,5],
                     [9,0,0,3,0,0,8,0,2],
                     [2,0,0,0,0,4,0,0,0],
                     [0,1,5,0,0,0,9,0,3]],
                 [[0,0,8,0,0,2,0,0,4],
                     [0,0,0,0,0,0,0,7,3],
                     [0,2,0,1,0,0,9,8,0],
                     [0,0,4,0,0,9,0,3,1],
                     [0,8,0,4,0,3,0,5,0],
                     [1,3,0,5,0,0,6,0,0],
                     [0,1,9,0,0,7,0,6,0],
                     [6,7,0,0,0,0,0,0,0],
                     [2,0,0,6,0,0,1,0,0]],
                 [[9,8,0,0,0,0,0,1,4],
                     [0,7,3,9,0,0,2,0,0],
                     [4,0,0,2,5,0,0,7,0],
                     [0,2,0,7,0,4,0,0,0],
                     [0,0,0,0,6,0,0,0,0],
                     [0,0,0,8,0,3,0,9,0],
                     [0,5,0,0,7,9,0,0,1],
                     [0,0,9,0,0,6,8,5,0],
                     [7,6,0,0,0,0,0,2,9]],
                 [[4,0,6,0,0,8,2,1,0],
                     [0,0,7,2,4,0,0,3,0],
                     [3,0,0,0,0,5,0,0,0],
                     [6,0,0,0,0,3,9,0,0],
                     [0,0,2,0,0,0,1,0,0],
                     [0,0,5,1,0,0,0,0,7],
                     [0,0,0,4,0,0,0,0,1],
                     [0,7,0,0,8,1,5,0,0],
                     [0,9,4,3,0,0,7,0,8]],
                [[4,0,0,2,9,0,5,6,0],
                    [0,3,9,0,0,1,0,0,0],
                    [0,2,5,0,0,0,1,0,0],
                    [5,8,0,0,2,0,9,0,0],
                    [0,0,0,0,7,0,0,0,0],
                    [0,0,4,0,6,0,0,8,1],
                    [0,0,1,0,0,0,2,3,0],
                    [0,0,0,5,0,0,8,9,0],
                    [0,5,7,0,8,2,0,0,4]],
                [[0,0,9,0,7,2,0,5,0],
                    [0,0,2,0,3,0,8,1,0],
                    [0,5,3,1,0,0,0,0,0],
                    [0,0,0,5,0,0,2,0,0],
                    [1,0,5,0,0,0,3,0,4],
                    [0,0,7,0,0,8,0,0,0],
                    [0,0,0,0,0,7,1,4,0],
                    [0,8,1,0,4,0,9,0,0],
                    [0,7,0,8,6,0,5,0,0]],
                [[1,9,0,0,0,7,4,0,0],
                    [3,6,0,9,0,0,0,0,1],
                    [0,0,0,0,0,3,0,0,6],
                    [0,0,0,0,7,0,0,9,5],
                    [0,5,8,0,4,0,3,1,0],
                    [7,3,0,0,5,0,0,0,0],
                    [5,0,0,7,0,0,0,0,0],
                    [2,0,0,0,0,4,0,3,9],
                    [0,0,6,1,0,0,0,4,8]],
                [[6,8,7,3,0,0,0,0,0],
                    [0,2,0,9,0,0,0,0,7],
                    [1,9,0,2,0,0,0,5,0],
                    [0,4,0,0,0,3,0,0,8],
                    [0,0,6,0,0,0,7,0,0],
                    [7,0,0,4,0,0,0,3,0],
                    [0,3,0,0,0,4,0,7,1],
                    [2,0,0,0,0,5,0,6,0],
                    [0,0,0,0,0,8,5,9,3]],
    [[0,0,0,0,5,0,0,1,9],
        [0,0,0,0,2,0,6,3,5],
        [0,0,9,1,0,0,7,0,0],
        [0,0,8,0,4,0,9,0,1],
        [6,0,0,0,0,0,0,0,7],
        [1,0,5,0,9,0,8,0,0],
        [0,0,6,0,0,5,1,0,0],
        [4,5,2,0,1,0,0,0,0],
        [3,7,0,0,8,0,0,0,0]]
);


$answers = array([[7,1,6,3,5,8,4,2,9],
    [3,9,8,2,4,1,7,6,5],
    [4,2,5,6,9,7,3,1,8],
    [1,8,4,9,3,6,5,7,2],
    [9,5,7,4,1,2,8,3,6],
    [2,6,3,8,7,5,9,4,1],
    [6,7,9,5,2,3,1,8,4],
    [8,4,1,7,6,9,2,5,3],
    [5,3,2,1,8,4,6,9,7]],

    [[8,5,3,4,2,9,6,7,1],
        [1,7,9,5,3,6,2,8,4],
        [6,4,2,8,1,7,5,3,9],
        [5,8,1,9,6,3,4,2,7],
        [4,2,6,7,5,1,3,9,8],
        [3,9,7,2,4,8,1,6,5],
        [9,6,4,3,7,5,8,1,2],
        [2,3,8,1,9,4,7,5,6],
        [7,1,5,6,8,2,9,4,3]],
    [[3,6,8,7,9,2,5,1,4],
        [4,9,1,8,5,6,2,7,3],
        [5,2,7,1,3,4,9,8,6],
        [7,5,4,2,6,9,8,3,1],
        [9,8,6,4,1,3,7,5,2],
        [1,3,2,5,7,8,6,4,9],
        [8,1,9,3,2,7,4,6,5],
        [6,7,5,9,4,1,3,2,8],
        [2,4,3,6,8,5,1,9,7]],
    [[9,8,2,6,3,7,5,1,4],
        [5,7,3,9,4,1,2,8,6],
        [4,1,6,2,5,8,9,7,3],
        [8,2,1,7,9,4,6,3,5],
        [3,9,7,5,6,2,1,4,8],
        [6,4,5,8,1,3,7,9,2],
        [2,5,8,3,7,9,4,6,1],
        [1,3,9,4,2,6,8,5,7],
        [7,6,4,1,8,5,3,2,9]],
    [[4,5,6,7,3,8,2,1,9],
        [8,1,7,2,4,9,6,3,5],
        [3,2,9,6,1,5,8,7,4],
        [6,4,1,8,7,3,9,5,2],
        [7,8,2,5,9,4,1,6,3],
        [9,3,5,1,6,2,4,8,7],
        [5,6,8,4,2,7,3,9,1],
        [2,7,3,9,8,1,5,4,6],
        [1,9,4,3,5,6,7,2,8]],
    [[4,1,8,2,9,7,5,6,3],
        [6,3,9,4,5,1,7,2,8],
        [7,2,5,6,3,8,1,4,9],
        [5,8,3,1,2,4,9,7,6],
        [1,9,6,8,7,3,4,5,2],
        [2,7,4,9,6,5,3,8,1],
        [8,6,1,7,4,9,2,3,5],
        [3,4,2,5,1,6,8,9,7],
        [9,5,7,3,8,2,6,1,4]],
    [[8,1,9,6,7,2,4,5,3],
        [7,6,2,4,3,5,8,1,9],
        [4,5,3,1,8,9,7,2,6],
        [6,3,8,5,9,4,2,7,1],
        [1,9,5,7,2,6,3,8,4],
        [2,4,7,3,1,8,6,9,5],
        [3,2,6,9,5,7,1,4,8],
        [5,8,1,2,4,3,9,6,7],
        [9,7,4,8,6,1,5,3,2]],
    [[1,9,5,6,2,7,4,8,3],
        [3,6,4,9,8,5,2,7,1],
        [8,2,7,4,1,3,9,5,6],
        [4,1,2,3,7,6,8,9,5],
        [6,5,8,2,4,9,3,1,7],
        [7,3,9,8,5,1,6,2,4],
        [5,4,3,7,9,8,1,6,2],
        [2,8,1,5,6,4,7,3,9],
        [9,7,6,1,3,2,5,4,8]],
    [[6,8,7,3,5,1,4,2,9],
        [5,2,3,9,4,6,1,8,7],
        [1,9,4,2,8,7,3,5,6],
        [9,4,2,5,7,3,6,1,8],
        [3,5,6,8,1,9,7,4,2],
        [7,1,8,4,6,2,9,3,5],
        [8,3,5,6,9,4,2,7,1],
        [2,7,9,1,3,5,8,6,4],
        [4,6,1,7,2,8,5,9,3]],
    [[2,6,3,7,5,8,4,1,9],
        [8,1,7,4,2,9,6,3,5],
        [5,4,9,1,6,3,7,8,2],
        [7,3,8,5,4,2,9,6,1],
        [6,9,4,8,3,1,2,5,7],
        [1,2,5,6,9,7,8,4,3],
        [9,8,6,3,7,5,1,2,4],
        [4,5,2,9,1,6,3,7,8],
        [3,7,1,2,8,4,5,9,6]]


);

$indexNum = rand(0,9);
// If there is a Sudoku session, use that. Otherwise, create one
if(!isset($_SESSION[SUDOKU_SESSION])) {
    $_SESSION[SUDOKU_SESSION] = new Sudoku($answers[$indexNum],$puzzles[$indexNum]);
}

$sudoku = $_SESSION[SUDOKU_SESSION];
$view = new SudokuView($sudoku);
