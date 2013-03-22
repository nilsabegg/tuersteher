<?php

$tuersteher = new Tuersteher();
$tuersteher->add('email', 'email', '\Tuersteher\Validator\Filter\Email');
$tuersteher->add('email', 'string', '\Tuersteher\Validator\Custom\String')->maxLength(20);
$tuersteher->validate('nils@web.de');