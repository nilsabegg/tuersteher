<?php

namespace Tuersteher\Test\Validator\Filter;

class IpTest extends \PHPUnit_Framework_TestCase
{

    public function testIsIp()
    {

        $validator = new \Tuersteher\Validator\Filter\Ip();
        $isValid = $validator->isValid('127.0.0.1');
        $this->assertTrue($isValid);
        $isValid2 = $validator->isValid('8.8.8.8');
        $this->assertTrue($isValid2);
        $isValid3 = $validator->isValid(500);
        $this->assertFalse($isValid3);

    }

}