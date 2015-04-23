<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$row = array('id' => 12,
			'userid' => 'dude',
			'name' => 'The Dude',
			'email' => 'dude@ranch.com',
			'password' => '12345678');
		$user = new User($row);
		$this->assertEquals(12, $user->getId());
		$this->assertEquals('dude', $user->getUserid());
		$this->assertEquals('The Dude', $user->getName());
		$this->assertEquals('dude@ranch.com', $user->getEmail());
	}
}

/// @endcond
?>
