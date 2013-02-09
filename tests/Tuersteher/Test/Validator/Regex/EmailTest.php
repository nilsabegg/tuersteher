<?php

namespace Tuersteher\Test\Validator\Regex;

class EmailTest extends \PHPUnit_Framework_TestCase
{

    public function testIsEmail()
    {

        $emailValidator = new \Tuersteher\Validator\Regex\Email();
        $isValid = $emailValidator->validate('dsfdfsdff');
        $this->assertFalse($isValid());
        $isValid2 = $emailValidator->validate('http://dsfdfsdff.de');
        $this->assertFalse($isValid2());
        $isValid3 = $emailValidator->validate('test@.com');
        $this->assertFalse($isValid3());
        $isValid4 = $emailValidator->validate('test@text.com');
        $this->assertTrue($isValid4());

    }

}
