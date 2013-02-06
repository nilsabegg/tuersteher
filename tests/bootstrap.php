<?php

require_once __DIR__.'/Autloader.php';

$appDir = __DIR__ . '../src';
$appLoader = new Autoloader('Tuersteher', $appDir);
$appLoader->register();

$testDir = __DIR__;
$testLoader = new Autoloader('Tuersteher\\Test', $testDir);
$testLoader->register();

//require_once __DIR__.'/Tuersteher/Test/Service.php';
//require_once __DIR__.'/Tuersteher/Test/Invokable.php';
//require_once __DIR__.'/Tuersteher/Test/NonInvokable.php';
