<?php
/**
 * Created by PhpStorm->
 * User: Aries
 * Date: 2/16/15
 * Time: 3:10 PM
 */

class Sudoku
{
    private $board; //Array of Block Objects
                    //each Block is a 3x3 grid
                    //that contains Cell objects

    private $solution = [];

    private $cellRow;
    private $cellCol;
    private $blockId;
    private $player;


    public function __construct($answer,$maze){

        $this->createBlocks();
        $xAxis = 0;
        $yAxis = 0;

        for($r = 0; $r < 9; $r++)
        {
            for($c = 0; $c < 9; $c++)
            {
                $cell = new Cell($maze[$r][$c], $answer[$r][$c]);
                $acell = new Cell($answer[$r][$c],$maze[$r][$c]);
                $this->board[$xAxis][$yAxis]->addCell($cell);
                $this->solution[$xAxis][$yAxis]->addCell($acell);
                //If the column of the puzzle is 4, or 7
                //Increment the column of blocks by 1
                if($c%3==2)
                {
                    $yAxis++;
                }
            }

            $yAxis = 0;
            //If the puzzle row is 4, or 7
            //Increment the row of blocks
            if($r%3==2)
            {
                $xAxis++;
            }
        }

    }

    public function getBlock($row, $col)
    {
        return $this->board[$row][$col];
    }
    public function getSolution($row,$col){
        return $this->solution[$row][$col];
    }

    public function setPlayer($name)
    {
        $this->player = $name;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function createBlocks()
    {
        $count = 0;
        for($r = 0; $r < 3; $r++)
        {
            for($c = 0; $c < 3; $c++)
            {
                $this->board[$r][$c] = new Block($r, $c, $count);
                $this->solution[$r][$c] =  new Block($r, $c, $count);
                $count++;
            }
        }
    }


    public function getBlockByID($id)
    {
        $block = null;
        switch($id)
        {
            case 0:
                $block = $this->board[0][0];
                break;
            case 1:
                $block = $this->board[0][1];
                break;
            case 2:
                $block = $this->board[0][2];
                break;
            case 3:
                $block = $this->board[1][0];
                break;
            case 4:
                $block = $this->board[1][1];
                break;
            case 5:
                $block = $this->board[1][2];
                break;
            case 6:
                $block = $this->board[2][0];
                break;
            case 7:
                $block = $this->board[2][1];
                break;
            case 8:
                $block = $this->board[2][2];
                break;
        }
        return $block;
    }

    public function cellToModify($r,$c,$id)
    {
        $this->cellRow = $r;
        $this->cellCol = $c;
        $this->blockId = $id;
        if($this->getBlockByID($id)->getCell($r, $c)->getBuildFlag())
        {
            $this->getBlockByID($id)->getCell($r, $c)->setBuildFlag();
        }
    }

    public function getCellRow()
    {
        return $this->cellRow;
    }

    public function getCellCol()
    {
        return $this->cellCol;
    }

    public function getBlockId()
    {
        return $this->blockId;
    }

    public function cellToClue($r, $c, $id)
    {
        $this->cellRow = $r;
        $this->cellCol = $c;
        $this->blockId = $id;
    }

}