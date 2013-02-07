<?php

namespace Tuersteher\Test\Validator\Filter;

class IntegerTest extends \PHPUnit_Framework_TestCase
{

    public function testIsInteger()
    {
        $validator = new \Tuersteher\Validator\Filter\Integer();
        $isValid = $validator->isValid(257);
        $this->assertTrue($isValid);
        $options = array('options' => array(
                'min_range' => 0,
                'max_range' => 256
            ));
        $validator->setOptions($options);
        $isValid2 = $validator->isValid(244);
        $this->assertTrue($isValid2);
        $isValid3 = $validator->isValid(500);
        $this->assertFalse($isValid3);

    }

}
