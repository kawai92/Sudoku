<?php
/**
 * Created by PhpStorm.
 * User: Aries
 * Date: 4/24/15
 * Time: 4:21 PM
 */

class UserBlocks extends Table {
    private $solution = [];
    private $board = [];

    public function __construct(Site $site){
        parent::__construct($site,"userblocks");
    }

    public function load($userid){ //if we have something under this user,return true
                                     //if not, return false
        $sql =<<<SQL
SELECT * FROM $this->tableName
WHERE userid =?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));

        if($statement->rowCount()===0){
            return false;
        }
        else{
            foreach($statement as $Srow){
                $row = (int)($Srow['row']);
                $col = (int)($Srow['col']);
                $this->board[$row][$col] = (int)($Srow['value']);
                $this->solution[$row][$col] = (int)($Srow['sol']);
            }
            return true;
        }

    }

    public function getBoard(){
        return $this->board;
    }
    public function getSolution(){
        return $this->solution;
    }
}