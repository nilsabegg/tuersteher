<?php

namespace Tuersteher\Test;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {

        $isValid = true;
        $message = 'Valid.';
        $result = new \Tuersteher\Result($isValid, $message);
        $this->assertEquals($isValid, $result->getIsValid());
        $this->assertEquals($message, $result->getMessage());
        $isValid2 = 324;
        $this->setExpectedException('\\Tuersteher\\Exception');
        new \Tuersteher\Result($isValid2);
        $message2 = array();
        $this->setExpectedException('\\Tuersteher\\Exception');
        new \Tuersteher\Result($isValid, $message2);

    }

    public function testToString()
    {

    }

    public function testGetAndSetIsValid()
    {

        $isValid = true;
        $result = new \Tuersteher\Result($isValid);
        $this->assertEquals($isValid, $result->getIsValid());
        $isValid2 = false;
        $result->setIsValid($isValid2);
        $this->assertEquals($isValid2, $result->getIsValid());
        $isValid2 = 'dsfsfsddf';
        $this->setExpectedException('\\Tuersteher\\Exception');
        $result->setIsValid($isValid2);

    }

    public function testGetAndSetMessage()
    {

        $message = 'Valid.';
        $result = $result = new \Tuersteher\Result(true, $message);
        $this->assertEquals($message, $result->getMessage());
        $message2 = 'Not Valid.';
        $result->setMessage($message2);
        $this->assertEquals($message2, $result->getMessage());
        $message3 = array();
        $this->setExpectedException('\\Tuersteher\\Exception');
        $result->setMessage($message3);

    }

    public function testIsValid()
    {



    }

}
