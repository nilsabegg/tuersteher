<?php

namespace Tuersteher\Test\Validator\Filter;

class RegexpTest extends \PHPUnit_Framework_TestCase
{

    public function testIsRegularExpression()
    {

        $validator = new \Tuersteher\Validator\Filter\Regexp();
        $options = array(
            'regexp' => '/^M(.*)/'
        );
        $validator->setOptions($options);
        $isValid = $validator->isValid('Match');
        $this->assertTrue($isValid);
        $isValid2 = $validator->isValid('Milchgesicht');
        $this->assertTrue($isValid2);
        $isValid3 = $validator->isValid('Schweinebacke');
        $this->assertFalse($isValid3);

    }

}