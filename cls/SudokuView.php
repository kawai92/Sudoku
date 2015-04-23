<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 2/25/15
 * Time: 8:09 PM
 */

class SudokuView {

    private $sudoku;
    /*
     *
     */
    public function __construct(Sudoku $board)
    {
        $this->sudoku = $board;
    }

    /*
     *
     */
    public function presentTable()
    {
        $html = "";
        $html .= '<table>'.'<tbody>';
        for($r = 0; $r <3; $r++)
        {
            $html .= '<tr>';
            $html .= '<td>'.$this->sudoku->getBlock($r, 0)->buildTable().'</td>';
            $html .= '<td>'.$this->sudoku->getBlock($r, 1)->buildTable().'</td>';
            $html .= '<td>'.$this->sudoku->getBlock($r, 2)->buildTable().'</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody>'.'</table>';
        return $html;
    }

    public function presentPlayer()
    {
        return '<p>'.$this->sudoku->getPlayer().'</p>';
    }

    public function presentAnswer(){
        $html = "";
        $html .= '<table>'.'<tbody>';
        for($r = 0; $r <3; $r++)
        {
            $html .= '<tr>';
            $html .= '<td>'.$this->sudoku->getSolution($r, 0)->buildTable().'</td>';
            $html .= '<td>'.$this->sudoku->getSolution($r, 1)->buildTable().'</td>';
            $html .= '<td>'.$this->sudoku->getSolution($r, 2)->buildTable().'</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody>'.'</table>';
        return $html;

    }
}