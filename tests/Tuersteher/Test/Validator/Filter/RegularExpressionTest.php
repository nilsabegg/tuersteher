<?php

namespace Tuersteher\Test\Validator\Filter;

class RegularExpressionTest extends \PHPUnit_Framework_TestCase
{

    public function testIsRegularExpression()
    {

        $validator = new \Tuersteher\Validator\Filter\RegularExpression();
        $isValid = $validator->isValid('/^def/');
        $this->assertTrue($isValid);
        $isValid2 = $validator->isValid('/(?P<name>\w+): (?P<zahl>\d+)/');
        $this->assertTrue($isValid2);
        $isValid3 = $validator->isValid(500);
        $this->assertFalse($isValid3);

    }

}