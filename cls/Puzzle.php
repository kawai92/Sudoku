<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 4/23/2015
 * Time: 3:49 PM
 */

class Puzzle {

    private $id;
    private $userid;
    private $blockid;

    /**
     * Constructor
     * @param $row Row from the user table in the database
     */
    public function __construct($row) {
        $this->id = $row['id'];
        $this->userid = $row['userid'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $blockid
     */
    public function setBlockid($blockid)
    {
        $this->blockid = $blockid;
    }

    public function getBlockid()
    {
        return $this->blockid;
    }

}