<?php
/**
 * Created by PhpStorm.
 * User: Aries
 * Date: 2/17/15
 * Time: 3:31 PM
 * Sudoku Cell
 * contains one simple cell, with row,col, and value
 */

class Cell
{
    private $row; //in the block
    private $col; //in the block
    private $value; //To be entered by user
    private $answer;//To be compared
    private $blockRow;//in the board
    private $blockCol;//in the board
    private $clueR;//in the cell
    private $clueC;//in the cell
    private $blockId;
    private $tableStatus;


    private $status;
    private $clues = [[0,0,0],
                      [0,0,0],
                      [0,0,0]];

    public function __construct($value,$answer)
    {
        $this->value = $value;
        $this->answer = $answer;
        $this->clueR = 0;
        $this->clueC = 0;
        $this->tableStatus = false;
        if($value == 0){
            $this->status = false;
        }else{
            $this->status = true;
        }
    }

    public function getStatus(){
        return $this->status;
    }

    public function addValue($v)
    {
        $this->value = $v;
        $this->setBuildFlag(false);
    }

    public function showValue()
    {
        if($this->value == 0)
        {
            return null;
        }

        return $this->value;
    }


    public function setPosition($r, $c, $blockRow, $blockCol, $id)
    {
        $this->row = $r;
        $this->col = $c;
        $this->blockRow = $blockRow;
        $this->blockCol = $blockCol;
        $this->blockId = $id;
    }

    public function getRow()
    {
        return $this->row;
    }

    public function getCol()
    {
        return $this->col;
    }


    public function addClue($value)
    {
        $this->clues[$this->clueR][$this->clueC] = $value;
        $this->setBuildFlag(true);
        $this->updateClueSize();
    }

    public function updateClueSize()
    {
        $this->clueC++;
        if($this->clueC == 3)
        {
            $this->clueC = 0;
            $this->clueR++;
        }
    }

    public function cluesSize()
    {
        $count = 0;
        for($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($this->clues[$i][$j] != 0)
                {
                    $count += 1;
                }
            }
        }
        return $count;
    }

    public function getBuildFlag()
    {
        return $this->tableStatus;
    }

    public function setBuildFlag($flag)
    {
        $this->tableStatus = $flag;
    }

    public function buildTable()
    {
        $table = "";
        $table .= '<a href="game-post.php?r='.$this->row.'&c='.$this->col.'&i='.$this->blockId.'">';
        $table .= '<table id="CellTable">'.'<tbody>';
        for($r = 0; $r < 3; $r++)
        {
            $table .= '<tr>';
            for($c = 0; $c < 3 ; $c++)
            {
                if($this->clues[$r][$c] == 0)
                {
                   $table .= '<td id="clueCell">' . '<p>&nbsp;</p>'  . '</td>';
                }

                else {
                    $table .= '<td id="clueCell">' . $this->clues[$r][$c] . '</td>';
                }
            }
            $table .= '</tr>';
        }
        $table .= '</tbody>'.'</table>'.'</a>';

        return $table;
    }

    /**
     * @return bool
     */
    public function isDone()
    {
        return $this->value == $this->answer ? true : false;
    }
}