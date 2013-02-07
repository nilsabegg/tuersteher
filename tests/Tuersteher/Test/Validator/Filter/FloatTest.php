<?php

namespace Tuersteher\Test\Validator\Filter;

class FloatTest extends \PHPUnit_Framework_TestCase
{

    public function testIsFloat()
    {
        
        $validator = new \Tuersteher\Validator\Filter\Float();
        $isValid = $validator->isValid(10000.12);
        $this->assertTrue($isValid);
        $flag = \FILTER_FLAG_ALLOW_THOUSAND;
        $validator->setFlag($flag);
        $isValid2 = $validator->isValid('10,000.12');
        $this->assertTrue($isValid2);
        $options = array(
            'decimal' => ','
        );
        $validator->setOptions($options);
        $isValid4 = $validator->isValid('10,000.12');
        $this->assertFalse($isValid4);
        $isValid3 = $validator->isValid('10.000,12');
        $this->assertTrue($isValid3);

    }

}
