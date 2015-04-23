<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 4/21/15
 * Time: 7:04 PM
 */

class Users extends Table
{

    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site)
    {
        parent::__construct($site, "sudokuser");
    }

    /**
     * Test for a valid login.
     * @param $user User id or email
     * @param $password Password credential
     * @returns User object if successful, null otherwise.
     */
    public function login($user, $password) {
        $sql =<<<SQL
SELECT * from $this->tableName
where userid=? or email=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($user, $user));
        if($statement->rowCount() === 0) {
            return null;
        }

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        // Get the encrypted password and salt from the record
        $hash = $row['password'];
        $salt = $row['salt'];

        // Ensure it is correct
        if($hash !== hash("sha256", $password . $salt)) {
            return null;
        }

        return new User($row);
    }

    /**
     * Get a user based on the id
     * @param $id ID of the user
     * @returns User object if successful, null otherwise.
     */
    public function get($id) {
        $sql =<<<SQL
SELECT * from $this->tableName
where id=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new User($statement->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * Determine if a user exists in the system.
     * @param $user A user ID or a email address.
     * @returns true if $user is an existing user ID or email address
     */
    public function exists($user) {
        $sql =<<<SQL
SELECT * from $this->tableName
where userid=? or email=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($user, $user));
        if($statement->rowCount() === 0) {
            return false;
        }

        return true;
    }

    /**
     * Add a user to the site
     * @param $user An array of user information containing keys for:
     * userid, name, email, password, salt, and joined.
     */
    public function add($user)
    {
        echo $this->tableName;
        $sql =<<<SQL
INSERT into $this->tableName (userid, name, email, password, salt)
VALUES (?, ?, ?, ?, ?)
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($user['userid'], $user['name'], $user['email'], $user['password'],  $user['salt']));
    }

    public function replacePassword($user)
    {
        $sql =<<<SQL
UPDATE $this->tableName SET password = ? , salt =?
WHERE email = ?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($user['password'], $user['salt'], $user['email']));
    }
}