<?php
/** @file
 * @brief Empty unit testing template/database version
 * @cond 
 * @brief Unit tests for the class 
 */

class SiteTest extends \PHPUnit_Framework_TestCase
{
    public function test_construct()
    {
        $site = new Site();
        $this->assertInstanceOf('Site', $site);
    }

    public function test_root()
    {
        $site = new Site();
        $site->setRoot('something');
        $this->assertEquals($site->getRoot(), 'something');
    }

    public function test_email()
    {
        $site = new Site();
        $site->setEmail('something');
        $this->assertEquals($site->getEmail(), 'something');
    }

    public function tests_getPrefix()
    {
        $site = new Site();
        $site->dbConfigure('msu', 'alkawaia','123', 'prefix');
        $this->assertEquals($site->getTablePrefix(), 'prefix');
    }

    public function test_localize()
    {
        $site = new Site();
        $localize = require 'localize.inc.php';

        if(is_callable($localize))
        {
            $localize($site);
        }

        $this->assertEquals('test_', $site->getTablePrefix());
    }
}
?>
