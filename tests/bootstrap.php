<?php

require_once __DIR__.'/Autoloader.php';
$testDir = __DIR__ . '';
$testLoader = new Autoloader('Tuersteher\\Test', $testDir);
$testLoader->register();

$appDir = __DIR__ . '/../src';
$appLoader = new Autoloader('Tuersteher', $appDir);
$appLoader->register();
