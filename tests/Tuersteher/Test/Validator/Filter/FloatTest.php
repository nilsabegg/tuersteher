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
        $this->assertEquals($validator->getDecimalSeperator(), ',');
        $isValid3 = $validator->validate($float2);
        $this->assertTrue($isValid3());
        $float3 = '2.300,23';
        $isValid4 = $validator->validate($float3);
        $this->assertFalse($isValid4());
        $validator->setThousandsSeperatorAllowed();
        $isAllowed = $validator->isThousandsSeperatorAllowed();
        $this->assertTrue($isAllowed);
        $isValid5 = $validator->validate($float3);
        $this->assertTrue($isValid5());
        $validator->setThousandsSeperatorAllowed(false);
        $isAllowed2 = $validator->isThousandsSeperatorAllowed();
        $this->assertFalse($isAllowed2);
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->setDecimalSeperator(array());

    }

    public function testDecimalSeperator()
    {

        $result = new \Tuersteher\Result\Validator();
        $validator = new \Tuersteher\Validator\Filter\Float();
        $validator->setResult($result);
        $validator->setDecimalSeperator(',');
        $validator->setDecimalSeperator('');
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->setThousandsSeperatorAllowed(array());

    }

}
