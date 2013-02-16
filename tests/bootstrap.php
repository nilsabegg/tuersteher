<?php

require_once __DIR__.'/Autoloader.php';

$appDir = __DIR__ . '/../src';
$appLoader = new Autoloader('Tuersteher', $appDir);
$appLoader->register();

$testDir = __DIR__ . '/..';
$testLoader = new Autoloader('Tuersteher\\Test', $testDir);
$testLoader->register();