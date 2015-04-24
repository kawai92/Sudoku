<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 4/22/2015
 * Time: 9:42 PM
 */

class Clues extends Table{

    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site)
    {
        parent::__construct($site, "clue");
    }

}