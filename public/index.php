<?php

use Php22\Application;
use Php22\Container;

require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../vendor/autoload.php';

$container = Container::getInstance();

$container->bind('app', function () {
    return new Application();
});

app()->run();
