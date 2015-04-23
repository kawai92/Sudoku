<?php
/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');
    $site->setEmail('alkawaia@cse.msu.edu');
    $site->setRoot('/~alkawaia/project2check');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=alkawaia',
        'alkawaia',      // Database user
        'A45891852',     // Database password
        'test_');        // Table prefix
};