<?php
use \Slim\App;

require_once "bootstrap.php";

$app = new App($AppConfig);

require_once "dependencies.php";

require 'routes/routes.php';

$app->run();
?>
