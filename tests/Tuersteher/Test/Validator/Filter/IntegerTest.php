<?php

namespace Tuersteher\Test\Validator\Filter;

class IntegerTest extends \PHPUnit_Framework_TestCase
{

    public function testIsInteger()
    {

        $result = new \Tuersteher\Result\Validator();
        $validator = new \Tuersteher\Validator\Filter\Integer();
        $validator->setResult($result);
        $integer1 = 2.30;
        $isValid1 = $validator->validate($integer1);
        $this->assertFalse($isValid1());
        $integer2 = 230;
        $isValid2 = $validator->validate($integer2);
        $this->assertTrue($isValid2());
        $integer3 = 'string';
        $isValid3 = $validator->validate($integer3);
        $this->assertFalse($isValid3());
        $validator->setMin(6);
        $integer4 = 4;
        $isValid4 = $validator->validate($integer4);
        $this->assertFalse($isValid4());
        $validator->setMax(220);
        $isValid5 = $validator->validate($integer2);
        $this->assertFalse($isValid5());
        $integer5 = 200;
        $isValid6 = $validator->validate($integer5);
        $this->assertTrue($isValid6());

    }

}
