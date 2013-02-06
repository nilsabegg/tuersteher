<?php

namespace Tuersteher\Test\Validator\Filter;

class EmailTest extends \PHPUnit_Framework_TestCase
{

    public function testIsEmail()
    {
        $emailValidator = new \Tuersteher\Validator\Filter\Email();
        $isValid = $emailValidator->isValid('dsfdfsdff');
        $this->assertFalse($isValid);
        $isValid2 = $emailValidator->isValid('http://dsfdfsdff.de');
        $this->assertFalse($isValid2);
        $isValid3 = $emailValidator->isValid('test@.com');
        $this->assertFalse($isValid3);
        $isValid4 = $emailValidator->isValid('test@text.com');
        $this->assertTrue($isValid4);
    }

}
