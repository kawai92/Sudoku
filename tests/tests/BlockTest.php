<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class BlockTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$block = new Block(0,0, 0);
		$this->assertInstanceOf('Block', $block);
		//$this->assertEquals($expected, $actual);
	}

	public function test_addCell()
	{
		$block = new Block(0,0, 0);
		$cell = new Cell(3, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(0,0));

		$cell = new Cell(2, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(0,1));

		$cell = new Cell(0, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(0,2));

		$cell = new Cell(2, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(1,0));

		$cell = new Cell(2, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(1,1));

		$cell = new Cell(2, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(1,2));

		$cell = new Cell(2, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(2,0));

		$cell = new Cell(2, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(2,1));

		$cell = new Cell(2, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(2,2));

	}

	public function test_getXAxis()
	{
		$block = new Block(0,0, 0);
		$this->assertEquals(0, $block->getXAxis());

		$block = new Block(1,0, 3);
		$this->assertEquals(1, $block->getXAxis());

		$block = new Block(2,0, 6);
		$this->assertEquals(2, $block->getXAxis());

	}

	public function test_getYAxis()
	{
		$block = new Block(0,0, 0);
		$this->assertEquals(0, $block->getYAxis());

		$block = new Block(1,1, 4);
		$this->assertEquals(1, $block->getYAxis());

		$block = new Block(2,2, 5);
		$this->assertEquals(2, $block->getYAxis());

	}

	public function test_getID()
	{
		$block = new Block(2,3,4);
		$this->assertEquals(4, $block->getID());
	}

	public function test_getCell()
	{
		$block = new Block(0,0, 0);
		$cell = new Cell(3, 3);
		$block->addCell($cell);

		$this->assertInstanceOf('Cell', $block->getCell(0,0));
	}

	public function test_updateCounters()
	{
		$block = new Block(0,2, 0);
		$cell = new Cell(3, 3);
		$block->addCell($cell);

		$this->assertEquals(0, $block->getXAxis());
		$this->assertEquals(2, $block->getYAxis());
	}

}

/// @endcond
?>
