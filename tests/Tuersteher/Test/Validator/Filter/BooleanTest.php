<?php

namespace Tuersteher\Test\Validator\Filter;

class BooleanTest extends \PHPUnit_Framework_TestCase
{

    public function testIsBoolean()
    {

        $validator = new \Tuersteher\Validator\Filter\Boolean();
        $isValid = $validator->validate(true);
        $this->assertTrue($isValid());
        $this->assertTrue($validator->isValid());
        $validator->setMessage('This is message1');
        $isValid2 = $validator->validate('yes');
        $this->assertTrue($validator->isValid('yes'));
        $this->assertTrue($isValid2());
        $isValid3 = $validator->validate(500);
        $this->assertFalse($isValid3());
        $this->assertFalse($validator->isValid());


    }

}
