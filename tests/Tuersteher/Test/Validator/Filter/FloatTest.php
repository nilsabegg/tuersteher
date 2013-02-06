<?php

namespace Tuersteher\Test\Validator\Filter;

class FloatTest extends \PHPUnit_Framework_TestCase
{

    public function testIsFloat()
    {
        $validator = new \Tuersteher\Validator\Filter\Integer();
        $options = array(
            'decimal' => ','
        );
        $validator->setOptions($options);
        $flag = \FILTER_FLAG_ALLOW_THOUSAND;
        $validator->setFlag($flag);
        $isValid = $validator->isValid('10,000.12');
        $this->assertFalse($isValid);
        $isValid2 = $validator->isValid('10.000,12');
        $this->assertTrue($isValid2);

    }

}
