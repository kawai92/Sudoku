<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 4/21/15
 * Time: 7:03 PM
 */

class Puzzles extends Table{
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site)
    {
        parent::__construct($site, "puzzle");
    }

    public function puzzleExists(User $userid) {
        $sql =<<<SQL
SELECT * FROM $this->tableName

WHERE userid=?

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid->getId()));

        if($statement->rowCount() === 0){
            return false;
        }
        else{
            return true;
        }

    }

    public function getPuzzle(User $user){

        $sql =<<<SQL
SELECT * from $this->tableName
where userid=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($user->getId()));

        if($statement->rowCount() === 0) {
            return null;
        }

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return new Puzzle($row);

    }

    public function savePuzzle($user, $puzzle) {
        $sql =<<<SQL
INSERT INTO $this->tableName(userid, name, description, created)
values(?, ?, ?, ?)
SQL;



}