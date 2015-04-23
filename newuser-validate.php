<?php
$login = false;
require_once "game.inc.php";

$controller = new ValidationController($site);
$msg = $controller->validate($_GET['v']);

header("location: login.php");
exit;