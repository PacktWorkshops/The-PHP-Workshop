<?php

require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('application_log');
$logger->pushHandler(new StreamHandler('./logs/app.log', Logger::INFO));

$e = new Packt\Example($logger);
$e->doSomething();