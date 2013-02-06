<?php

namespace Tuersteher\Test\Validator\Filter;

class UrlTest extends \PHPUnit_Framework_TestCase
{

    public function testIsUrl()
    {
        $urlValidator = new \Tuersteher\Validator\Filter\Url();
        $isValid = $urlValidator->isValid('dsfdfsdff');
        $this->assertFalse($isValid);
        $isValid2 = $urlValidator->isValid('http://dsfdfsdff.de');
        $this->assertFalse($isValid2);
    }

}