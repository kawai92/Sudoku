<?php
/**
 * Created by PhpStorm.
 * User: Aries
 * Date: 4/26/15
 * Time: 4:21 PM
 */

class SaveClues extends Table{

    public function __construct(Site $site){
        parent::__construct($site,"blockclues");
    }


    /**
     * @param $blockID the block we want to save our clue table
     */
    function ifExist($blockID){
        $sql =<<<SQL
SELECT * FROM $this->tableName

WHERE blockID=?

SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($blockID));
        if($statement->rowCount()===0){
            return false;
        }
        else{
            return true;
        }


    }

    function clear($blockID){
        $sql =<<<SQL
DELETE FROM $this->tableName

WHERE blockID=?

SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        if($statement->execute(array($blockID))){
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * @param $blockID, one block we want to save our clues in
     * @param $b the clue board we want to save
     */
    function saveClues($blockID,$b){
        //if there is one game has saved under this user
        if($this->ifExist($blockID)){
            $this->clear($blockID);
        }

        $blockID = 0; //block id we saved for one user, start from 0
        for($row = 0;$row < 9;$row++){
            for($col = 0;$col < 9;$col++){
                $sql =<<<SQL
INSERT INTO $this->tableName(blockID,value,row,col) values(?,?,?,?)

SQL;
                $pdo = $this->pdo();
                $statement = $pdo->prepare($sql);
                if($statement->execute(array(
                    $blockID,
                    $b[$row][$col],
                    $row,
                    $col
                    ))){
                    return true;
                }
                else{
                    return false;
                }


            }
        }
    }


}