<?php

 require_once __DIR__ . '/../../src/Tuersteher/ValidatorInterface.php';
 require_once __DIR__ . '/../../src/Tuersteher/Validator.php';
 require_once __DIR__ . '/../../src/Tuersteher/Validator/FilterValidator.php';
 require_once __DIR__ . '/../../src/Tuersteher/Validator/Filter/Url.php';



function validateUrl($url)
{

    $urlValidator = new \Tuersteher\Validator\Filter\Url();
    $isValidUrl = $urlValidator->isValid($url);
    echo '<p>';
    echo $url;
    echo '</p>';
    echo '<pre>';
    var_dump($isValidUrl);
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