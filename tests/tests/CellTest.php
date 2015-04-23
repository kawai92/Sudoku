<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class CellTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct()
	{
		$cell = new Cell(2,3);
		$this->assertInstanceOf('Cell', $cell);
		$this->assertTrue($cell->getStatus());

		$cell = new Cell(0,0);
		$this->assertFalse($cell->getStatus());

	}
	public function test_getStatus(){
		$cell = new Cell(2,3);
		$this->assertTrue($cell->getStatus());
		$cell = new Cell(0,2);
		$this->assertFalse($cell->getStatus());
	}
	public function test_showValue(){
		$cell = new Cell(1,1);
		$this->assertEquals(1,$cell->showValue());
	}
	public function test_addValue(){
		$cell = new Cell(0,2);
		$cell->addValue(5);
		$this->assertEquals(5,$cell->showValue());
	}


	public function test_isDone(){
		$cell = new Cell(3,3);
		$this->assertTrue($cell->isDone());
		$cell = new Cell(0,3);
		$this->assertFalse($cell->isDone());
	}

	public function test_addClue(){
		$cell = new Cell(0, 5);

		$cell->addClue(3);

		$this->assertEquals(1, $cell->cluesSize());

		$cell->addClue(5);
		$cell->addClue(6);

		$this->assertEquals(3, $cell->cluesSize());
	}

	public function test_getBuildFlag(){
		$cell = new Cell(0, 5);
		$this->assertFalse($cell->getBuildFlag());

		$cell->addClue(5);
		$cell->addClue(6);

		$this->assertTrue($cell->getBuildFlag());
	}

	/*public function test_buildTable(){
		$cell = new Cell(0, 5);

		$cell->addClue(2);

		$table = <<<HTML
		<table id="CellTable">
		<tbody>
			<tr>
				<td id="clueCell">2</td>
				<td id="clueCell"><p>&nbsp;</p></td>
				<td id="clueCell"><p>&nbsp;</p></td>
			</tr>
			<tr>
				<td id="clueCell"><p>&nbsp;</p></td>
				<td id="clueCell"><p>&nbsp;</p></td>
				<td id="clueCell"><p>&nbsp;</p></td>
			</tr>
			<tr>
				<td id="clueCell"><p>&nbsp;</p></td>
				<td id="clueCell"><p>&nbsp;</p></td>
				<td id="clueCell"><p>&nbsp;</p></td>
			</tr>
		</tbody>
		</table>
HTML;
		$cell->setPosition(0,0,0,0, 1);
		$build = $cell->buildTable();
		echo "\n";
		echo htmlentities($table);
		echo "\n";
		echo htmlentities($build);
		$this->assertXmlStringEqualsXmlString($table, $build);
	}*/
}
?>
