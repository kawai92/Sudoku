<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 2/27/15
 * Time: 2:28 PM
 */

class Block
{
    private $smallBoard;
    private $id;
    private $xAxis;//The x position of the block in the Sudoku
    private $yAxis;//The y position of the block in the Sudoku
    private $row;//The row position of the block table
    private $col;//The col position of the block table

    public function __construct($x, $y, $id)
    {
        $this->xAxis = $x;
        $this->yAxis = $y;
        $this->id = $id;
        $this->row = 0;
        $this->col = 0;
    }

    public function addCell($cell)
    {
        $cell->setPosition($this->row, $this->col, $this->xAxis, $this->yAxis, $this->id);
        $this->smallBoard[$this->row][$this->col] = $cell;
        $this->updateCounters();
    }

    public function updateCounters()
    {
        $this->col++;
        if ($this->col == 3) {
            $this->col = 0;
            $this->row++;
        }
    }

    public function getXAxis()
    {
        return $this->xAxis;
    }

    public function getYAxis()
    {
        return $this->yAxis;
    }

    public function getCell($row, $col)
    {
        return $this->smallBoard[$row][$col];
    }

    public function getID()
    {
        return $this->id;
    }

    public function buildTable()
    {
        $html = "";
        $html .= '<table id="subTable">' . '<tbody>';

        for ($r = 0; $r < 3; $r++)
        {
            $html .= '<tr>';//table row

            if (is_null($this->smallBoard[$r][0]->showValue()))
            {
                if($this->smallBoard[$r][0]->getBuildFlag())
                {
                    $html .= '<td>' . $this->smallBoard[$r][0]->buildTable() . '</td>';
                }
                else
                {
                    $html .= '<td id="emptyCell">' . '<a href="game-post.php?r=' . $r . '&c=0&i=' . $this->id . '">' . '<p>&nbsp;</p>' . '</a>' . '</td>';
                }
            }

            else
            {
                if($this->smallBoard[$r][0]->getBuildFlag())
                {
                    $html .= '<td>' . $this->smallBoard[$r][0]->buildTable() . '</td>';
                }

                else
                {
                    if (!$this->smallBoard[$r][0]->getStatus()) {
                        $html .= '<td id="emptyCell">' . '<a href="game-post.php?r=' . $r . '&c=0&i=' . $this->id . '">' . '<p>' . $this->smallBoard[$r][0]->showValue() . '</p>' . '</a>' . '</td>';

                    } else {
                        $html .= '<td id="HardCell">' . $this->smallBoard[$r][0]->showValue() . '</td>';
                    }
                }
            }


        if(is_null($this->smallBoard[$r][1]->showValue()))
        {
            if($this->smallBoard[$r][1]->getBuildFlag())
            {
                $html .= '<td>' . $this->smallBoard[$r][0]->buildTable() . '</td>';
            }
            else {
                $html .= '<td id="emptyCell">' . '<a href="game-post.php?r=' . $r . '&c=1&i=' . $this->id . '">' . '<p>&nbsp;</p>' . '</a>' . '</td>';
            }
        }

        else
        {
            if($this->smallBoard[$r][1]->getBuildFlag())
            {
                $html .= '<td>' . $this->smallBoard[$r][0]->buildTable() . '</td>';
            }
            else
            {
                if (!$this->smallBoard[$r][1]->getStatus()) {
                    $html .= '<td id="emptyCell">' . '<a href="game-post.php?r=' . $r . '&c=1&i=' . $this->id . '">' . '<p>' . $this->smallBoard[$r][1]->showValue() . '</p>' . '</a>' . '</td>';

                } else {
                    $html .= '<td id="HardCell">' . $this->smallBoard[$r][1]->showValue() . '</td>';
                }
            }
        }

        if (is_null($this->smallBoard[$r][2]->showValue()))
        {
            if($this->smallBoard[$r][2]->getBuildFlag())
            {
                $html .= '<td>' . $this->smallBoard[$r][0]->buildTable() . '</td>';
            }
            else{
                $html .= '<td id="emptyCell">' . '<a href="game-post.php?r=' . $r . '&c=2&i=' . $this->id . '">' . '<p>&nbsp;</p>' . '</a>' . '</td>';
            }
        }

        else
        {
            if($this->smallBoard[$r][2]->getBuildFlag())
            {
                $html .= '<td>' . $this->smallBoard[$r][0]->buildTable() . '</td>';
            }
            else {
                if (!$this->smallBoard[$r][2]->getStatus()) {
                    $html .= '<td id="emptyCell">' . '<a href="game-post.php?r=' . $r . '&c=2&i=' . $this->id . '">' . '<p>' . $this->smallBoard[$r][2]->showValue() . '</p>' . '</a>' . '</td>';

                } else {
                    $html .= '<td id="HardCell">' . $this->smallBoard[$r][2]->showValue() . '</td>';
                }
            }
        }
        $html .= '</tr>';

        }
        $html .= '</tbody>'.'</table>';
        return $html;
    }

}