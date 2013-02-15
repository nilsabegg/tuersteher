<?php

 require_once __DIR__ . '/../../src/Tuersteher/Interfaces/Validator.php';
 require_once __DIR__ . '/../../src/Tuersteher/Interfaces/Result.php';
 require_once __DIR__ . '/../../src/Tuersteher/Validator/Validator.php';
 require_once __DIR__ . '/../../src/Tuersteher/Validator/Filter.php';
 require_once __DIR__ . '/../../src/Tuersteher/Validator/Filter/Url.php';
 require_once __DIR__ . '/../../src/Tuersteher/Result/Validator.php';


function validateUrl($url)
{

    $urlValidator = new \Tuersteher\Validator\Filter\Url();
    $urlValidator->setResult(new \Tuersteher\Result\Validator());
    $isValidUrl = $urlValidator->validate($url);
    echo '<p>';
    echo $url;
    echo '</p>';
    echo '<pre>';
    var_dump($isValidUrl());
    var_dump($isValidUrl->isValid());
    echo '</pre>';

}

$url = 'http://google.com';
validateUrl($url); // true

$url = 'http:/google.com';
validateUrl($url); // false

$url = 'www.google.com';
validateUrl($url); // false

$url = 'http://192.168.2.0';
validateUrl($url); // true

$url = 'http://mail.google.com';
validateUrl($url); // true

$url = 'http://www.google.com';
validateUrl($url); // true

$url = 'http://www';
validateUrl($url);  // true

$url = 'http://www.com';
validateUrl($url);  // true

$url = 'http://www.türsteher.de';
validateUrl($url);
