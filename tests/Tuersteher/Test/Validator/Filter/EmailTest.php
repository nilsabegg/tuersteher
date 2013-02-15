<?php

namespace Tuersteher\Test\Validator\Filter;

class EmailTest extends \PHPUnit_Framework_TestCase
{

    public function testIsEmail()
    {

        $result = new \Tuersteher\Result\Validator();
        $validator = new \Tuersteher\Validator\Filter\Email();
        $validator->setResult($result);
        $emai1 = 'hans@wurst.com';
        $isValid1 = $validator->validate($emai1);
        $email2 = 'google.com';
        $isValid2 = $validator->validate($email2);
        $this->assertTrue($isValid1->isValid());
        $this->assertFalse($isValid2());

    }

}
