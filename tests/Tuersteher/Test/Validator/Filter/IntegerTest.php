<?php

namespace Tuersteher\Test\Validator\Filter;

class IntegerTest extends \PHPUnit_Framework_TestCase
{

    public function testIsInteger()
    {
        $validator = new \Tuersteher\Validator\Filter\Integer();
        $options = array(
                'min_range' => 0,
                'max_range' => 256
            );
        $validator->setOptions($options);
        $isValid = $validator->isValid(257);
        $this->assertFalse($isValid);
        $isValid2 = $validator->isValid(244);
        $this->assertTrue($isValid2);

    }

}
