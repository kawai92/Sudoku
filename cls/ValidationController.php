<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 4/23/15
 * Time: 12:56 PM
 */

class ValidationController {
    /**
     * Constructor
     * @param Site $site The site object
     */
    public function __construct(Site $site) {
        $this->site = $site;
    }

    /**
     * Validate a user
     * @param $validator The validator string
     * @return null or an error message
     */
    public function validate($validator) {
        $users = new Users($this->site);
        $nu = new NewUsers($this->site);

        $user = $nu->removeNewUser($validator);
        if($user === null) {
            return "Invalid validator";
        }

        $users->add($user);
        return null;
    }

    public function setNewPassword($validator)
    {
        $users = new Users($this->site);
        $np = new NewPasswords($this->site);
        $password = $np->removeNewPassword($validator);
        if($password === null) {
            return "Invalid validator";
        }

        $users->replacePassword($password);
        return null;
    }

    private $site;
}