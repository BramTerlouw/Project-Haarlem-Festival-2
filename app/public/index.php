<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../models/role.php';

use Routers\PatternRouter;
session_start();
// require __DIR__ . '/../patternrouter.php';


$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);
?>