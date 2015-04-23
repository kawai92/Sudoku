<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SudokuControllerTest extends \PHPUnit_Framework_TestCase
{
	private $answer = [ [2,6,3,7,5,8,4,1,9],
		[8,1,7,4,2,9,6,3,5],
		[5,4,9,1,6,3,7,8,2],
		[7,3,8,5,4,2,9,6,1],
		[6,9,4,8,3,1,2,5,7],
		[1,2,5,6,9,7,8,4,3],
		[9,8,6,3,7,5,1,2,4],
		[4,5,2,9,1,6,3,7,8],
		[3,7,1,2,8,4,5,9,6]];

	private $puzzle = [ [0,0,0,0,5,0,0,1,9],
		[0,0,0,0,2,0,6,3,5],
		[0,0,9,1,0,0,7,0,0],
		[0,0,8,0,4,0,9,0,1],
		[6,0,0,0,0,0,0,0,7],
		[1,0,5,0,9,0,8,0,0],
		[0,0,6,0,0,5,1,0,0],
		[4,5,2,0,1,0,0,0,0],
		[3,7,0,0,8,0,0,0,0]];

	public function test_construct()
	{
		$sudoku = new Sudoku($this->answer,$this->puzzle);
		$controller = new SudokuController($sudoku, array());

		$this->assertInstanceOf('SudokuController', $controller);
		$this->assertFalse($controller->isReset());

		$this->assertEquals('game.php', $controller->getPage());
	}
}

/// @endcond
?>
