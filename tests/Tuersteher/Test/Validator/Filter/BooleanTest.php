<?php

namespace Tuersteher\Test\Validator\Filter;

class BooleanTest extends \PHPUnit_Framework_TestCase
{

    public function testIsBoolean()
    {
        
        $validator = new \Tuersteher\Validator\Filter\Boolean();
        $isValid = $validator->isValid(true);
        $this->assertTrue($isValid);
        $isValid2 = $validator->isValid(false);
        $this->assertTrue($isValid2);
        $isValid3 = $validator->isValid(500);
        $this->assertFalse($isValid3);

    }

}
