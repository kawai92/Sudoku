<?php
/**
 * Created by PhpStorm.
 * User: Aries
 * Date: 4/24/15
 * Time: 4:21 PM
 */

class BlockClues extends Table {

    private $smallBoard = [];

    public function __construct(Site $site){
        parent::__construct($site,"blockclues");
    }

    public function load($blockid){ //if we have something under this block,return true
        //if not, return false
        $sql =<<<SQL
SELECT * FROM $this->tableName
WHERE userid =?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($blockid));

        if($statement->rowCount()===0){
            return false;
        }
        else{
            foreach($statement as $Srow){
                $row = (int)($Srow['row']);
                $col = (int)($Srow['col']);
                $this->board[$row][$col] = (int)($Srow['value']);
            }
            return true;
        }

    }

    public function getBoard(){
        return $this->smallBoard;
    }

}