<?php

namespace Tuersteher\Test\Result;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {

        $isValid = true;
        $message = 'Valid.';
        $result = new \Tuersteher\Result\Validator($isValid, $message);
        $this->assertEquals($isValid, $result->getIsValid());
        $this->assertEquals($message, $result->getMessage());
        $isValid2 = 324;
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        new \Tuersteher\Result\Validator($isValid2);

    }

    public function testToString()
    {

        $result = new \Tuersteher\Result\Validator(true);
        $this->assertEquals("$result", 'Is valid.');
        $result->setIsValid(false);
        $this->assertEquals("$result", 'Is not valid.');
        $result->setMessage('Blabla');
        $this->assertEquals("$result", 'Blabla');
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        new \Tuersteher\Result\Validator(true, array());

    }
//
//    public function testGetAndSetIsValid()
//    {
//
//        $isValid = true;
//        $result = new \Tuersteher\Result\Validator($isValid);
//        $this->assertEquals($isValid, $result->getIsValid());
//        $isValid2 = false;
//        $result->setIsValid($isValid2);
//        $this->assertEquals($isValid2, $result->getIsValid());
//        $isValid3 = 'dsfsfsddf';
//        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
//        $result->setIsValid($isValid3);
//
//    }
//
//    public function testGetAndSetMessage()
//    {
//
//        $message = 'Valid.';
//        $result = new \Tuersteher\Result\Validator(true, $message);
//        $this->assertEquals($message, $result->getMessage());
//        $message2 = 'Not Valid.';
//        $result->setMessage($message2);
//        $this->assertEquals($message2, $result->getMessage());
//        $message3 = array();
//        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
//        $result->setMessage($message3);
//
//    }
//
//    public function testIsValid()
//    {
//
//        $isValid = true;
//        $result = new \Tuersteher\Result\Validator($isValid, 'Valid.');
//        $this->assertEquals($result->isValid(), $isValid);
//        $isValid2 = false;
//        $result->setIsValid($isValid2);
//        $this->assertEquals($isValid2, $result->isValid());
//        $result2 = new \Tuersteher\Result\Validator();
//        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
//        $result2->isValid();
//
//    }

}
