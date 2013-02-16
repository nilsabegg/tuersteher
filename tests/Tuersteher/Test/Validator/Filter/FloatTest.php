<?php

namespace Tuersteher\Test\Validator\Filter;

class FloatTest extends \PHPUnit_Framework_TestCase
{

    public function testIsFloat()
    {

        $result = new \Tuersteher\Result\Validator();
        $validator = new \Tuersteher\Validator\Filter\Float();
        $validator->setResult($result);
        $float1 = 2.30;
        $isValid1 = $validator->validate($float1);
        $this->assertTrue($isValid1());
        $float2 = '2,30';
        $isValid2 = $validator->validate($float2);
        $this->assertFalse($isValid2());
        $validator->setDecimalSeperator(',');
        $isValid3 = $validator->validate($float2);
        $this->assertTrue($isValid3());
        $float3 = '2.300,23';
        $isValid4 = $validator->validate($float3);
        $this->assertFalse($isValid4());
        $validator->setThousandsSeperatorAllowed();
        $isValid5 = $validator->validate($float3);
        $this->assertTrue($isValid5());
        
    }

}
