<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 2/25/15
 * Time: 8:10 PM
 */

class SudokuController {

    private $sudoku;   // The Sudoku object we are controlling
    private $page;     // The next page we will go to
    private $reset = false; // True if we need to reset the game
    private $name; // The player name WE USES AS ID

    public $isGuest; //if yes, is guest playing


    public function __construct(Sudoku $sudoku, $request) {

        $this->sudoku = $sudoku;
        if(isset($request['r']) && isset($request['c']) && isset($request['i'])) { //case, user enters a number
            $this->sudoku->cellToModify($request['r'], $request['c'], $request['i']);
            $this->page = 'cellchoice.php';
        }
        elseif(isset($request['r']) && isset($request['c']) &&isset($request['i']) && isset($request['clue'])){
            $this->sudoku->cellToClue($request['r'], $request['c'], $request['i']);
            $this->page = 'cellchoice.php';
        }
        elseif(isset($request['value']))
        {
            $this->enterValue($request['value']);
            if($this->checkWin())
            {
                $this->page = 'win.php';
            }
            else {
                $this->page = 'game.php';
            }
        }
        elseif(isset($request['clue']))
        {
            $this->enterClue($request['clue']);
            $this->page = 'game.php';
        }
        else if(isset($request['g'])) { //case, user gives up
            //$this->reset = true;
            $this->page = 'giveup.php';
        }
        else if(isset($request['n'])) { //case, user resets the game
            // New game!
            $this->reset = true;
            $this->page = 'index.php';
        }

        /*else if(isset($request['user']))
        {
            $user = $request['user'];
            $this->sudoku->setPlayer($user->getName());
            $this->page = 'game.php';
        }*/

        else if(isset($request['name']))
        {
            $this->isGuest = false;
            $this->name = $request['name'];
            $this->sudoku->setPlayer($request['name']);
            $this->page = 'game.php';
        }

        else if(!isset($request['name']))
        {
            $this->isGuest = true;
            $this->sudoku->setPlayer("Guest Player");
            $this->page = 'game.php';
        }

        else if(isset($request['cheat']))
        {
            $_SESSION[SUDOKU_SESSION] = new Sudoku(
                [[2,6,3,7,5,8,4,1,9],
                [8,1,7,4,2,9,6,3,5],
                [5,4,9,1,6,3,7,8,2],
                [7,3,8,5,4,2,9,6,1],
                [6,9,4,8,3,1,2,5,7],
                [1,2,5,6,9,7,8,4,3],
                [9,8,6,3,7,5,1,2,4],
                [4,5,2,9,1,6,3,7,8],
                [3,7,1,2,8,4,5,9,6]],

                [[0,0,0,0,5,0,0,1,9],
                [0,0,0,0,2,0,6,3,5],
                [0,0,9,1,0,0,7,0,0],
                [0,0,8,0,4,0,9,0,1],
                [6,0,0,0,0,0,0,0,7],
                [1,0,5,0,9,0,8,0,0],
                [0,0,6,0,0,5,1,0,0],
                [4,5,2,0,1,0,0,0,0],
                [3,7,0,0,8,0,0,0,0]]);

            $this->page = 'game.php';
        }

        else{
            $this->page = 'game.php';
        }
    }

    /*
     *
     */
    public function getPage()
    {
        return $this->page;
    }

    /*
     *
     */
    public function isReset()
    {
        return $this->reset;
    }

    /*
     *
     */
    public function enterValue($v)
    {
        if((!is_numeric($v)) || ( $v < 0) || ( $v > 9))
        {
            return;
        }
        $row = $this->sudoku->getCellRow();
        $col = $this->sudoku->getCellCol();
        $id = $this->sudoku->getBlockId();
        $this->sudoku->getBlockByID($id)->getCell($row, $col)->addValue($v);
    }

    public function enterClue($clue)
    {

        if((!is_numeric($clue)) || ( $clue < 0) || ( $clue > 9))
        {
            return;
        }

        $row = $this->sudoku->getCellRow();
        $col = $this->sudoku->getCellCol();
        $id = $this->sudoku->getBlockId();
        $this->sudoku->getBlockByID($id)->getCell($row, $col)->addClue($clue);
    }

    public function checkWin(){
        $condition = true;
        for($id = 0;$id <= 8;$id++){
            for($row = 0;$row < 3;$row++) {
                for($col = 0;$col < 3;$col++) {
                    if(!($this->sudoku->getBlockByID($id)->getCell($row,$col)->isDone())){
                        $condition = false;
                    }
                }
            }
        }
        return $condition;
    }

    public function getUserName(){
        if($this->isGuest()){
            return "Guest Player";
        }else{
            return $this->name;
        }
    }
}