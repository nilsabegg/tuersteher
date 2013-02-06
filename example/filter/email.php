<?php

 require_once __DIR__ . '/../../src/Tuersteher/ValidatorInterface.php';
 require_once __DIR__ . '/../../src/Tuersteher/Validator.php';
 require_once __DIR__ . '/../../src/Tuersteher/Validator/FilterValidator.php';
 require_once __DIR__ . '/../../src/Tuersteher/Validator/Filter/Email.php';



function validateEmail($email)
{

    $emailValidator = new \Tuersteher\Validator\Filter\Email();
    $isValidEmail = $emailValidator->isValid($email);
    echo '<p>';
    echo $email;
    echo '</p>';
    echo '<pre>';
    var_dump($isValidEmail);
    echo '</pre>';

}

$email = 'info@kimble.com';
validateEmail($email); // true

$email = 'info@kimblecom';
validateEmail($email); // false

$email = 'info@.com';
validateEmail($email); // false

$email = 'info@free.kimble.com';
validateEmail($email); // true

$email = 'info@türsteher.de';
validateEmail($email); // true

$email = 'http://www.google.com';
validateEmail($email); // true

$email = 'http://www';
validateEmail($email);  //true

$email = 'http://www.com';
validateEmail($email);  //true
