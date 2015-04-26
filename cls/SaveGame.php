<?php
/**
 * Created by PhpStorm.
 * User: Aries
 * Date: 4/26/15
 * Time: 4:21 PM
 */

class SaveGame extends Table{

    public function __construct(Site $site){
        parent::__construct($site,"userblocks");
    }


    /**
     * @param $userid the owner of game we want to save
     */
    function ifExist($userid){
        $sql =<<<SQL
SELECT * FROM $this->tableName

WHERE userid=?

SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));
        if($statement->rowCount()===0){
            return false;
        }
        else{
            return true;
        }


    }

    function clear($userid){
        $sql =<<<SQL
DELETE FROM $this->tableName

WHERE userid=?

SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        if($statement->execute(array($userid))){
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * @param $userid the owner of game we want to save
     * @param $b the game board we want to save
     * @param $s the solution we want to save
     */
    function saveGame($userid,$b,$s){
        //if there is one game has saved under this user
        if($this->ifExist($userid)){
            $this->clear($userid);
        }

        $blockID = 0; //block id we saved for one user, start from 0
        for($row = 0;$row < 9;$row++){
            for($col = 0;$col < 9;$col++){
                   $sql =<<<SQL
INSERT INTO $this->tableName(id,userid,value,row,col,sol) values(?,?,?,?,?,?)

SQL;
                $pdo = $this->pdo();
                $statement = $pdo->prepare($sql);
                if($statement->execute(array($blockID,
                                             $userid,
                                             $b[$row][$col]->showValue(),
                                             $row,
                                             $col,
                                             $s[$row][$col]->showValue()))){
                    return true;
                }
                else{
                    return false;
                }


            }
        }
    }


}