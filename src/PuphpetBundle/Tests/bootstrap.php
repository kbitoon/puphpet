<?php

$loader = require __DIR__ . '/../../../vendor/autoload.php';
$loader->add('PuphpetBundle\Tests\Unit', __DIR__ . '/Unit');

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('opcache.enable', '0');

umask(0000);
