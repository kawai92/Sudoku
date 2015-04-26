<?php
/**
 * Created by PhpStorm.
 * User: Aries
 * Date: 4/26/15
 * Time: 4:21 PM
 */

class SaveGame extends Table{
    private $userID; //the user of this game
    private $solution = []; //the solution of this game
    private $board = [];
}