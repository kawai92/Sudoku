<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 2/25/15
 * Time: 8:31 PM
 */

function present_header() {
    $html  = <<< HTML

<a href="game-post.php?n=1">New Game</a>
<a href="game.php">Game</a>
HTML;

    return $html;
}