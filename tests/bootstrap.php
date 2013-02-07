<?php

require_once __DIR__.'/Autoloader.php';

$appDir = __DIR__ . '/../src';
$appLoader = new Autoloader('Tuersteher', $appDir);
$appLoader->register();
