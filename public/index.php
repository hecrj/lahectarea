<?php

namespace Sea;

define('Sea\DIR', dirname(__DIR__) . '/');

require(DIR . 'config/boot.php');
require(DIR . 'sea/components/Autoloader.php');

$loader = new Components\Autoloader();
require(DIR . 'config/autoload.php');
$loader->register();

$request = Components\Routing\Request::createFromGlobals();
$routes  = require(DIR . 'config/routes.php');

$application = new Application;
$application->respond($request, $routes);
