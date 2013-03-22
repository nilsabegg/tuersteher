<?php

namespace Tuersteher\Test\Result;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {

        $isValid = true;
        $message = 'Valid.';
        $result = new \Tuersteher\Result\Validator($isValid, $message);
        $this->assertEquals($isValid, $result->isValid());
        $this->assertEquals($message, $result->getMessage());

    }

    public function testConstructException()
    {

        $isValid = 324;
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        new \Tuersteher\Result\Validator($isValid);

    }

    public function testConstructException2()
    {

        $isValid = true;
        $message = array();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        new \Tuersteher\Result\Validator($isValid, $message);

    }

    public function testToString()
    {

        $result = new \Tuersteher\Result\Validator();

        $result->setValid(true);
        $this->assertEquals("$result", 'Is valid.');

        $result->setValid(false);
        $this->assertEquals("$result", 'Is not valid.');

        $result->setMessage('Blabla');
        $this->assertEquals("$result", 'Blabla');

    }

    public function testGetAndSetIsValid()
    {

        $isValid = true;
        $result = new \Tuersteher\Result\Validator($isValid);
        $this->assertEquals($isValid, $result->isValid());
        $isValid2 = false;
        $result->setValid($isValid2);
        $this->assertEquals($isValid2, $result->isValid());
        $isValid3 = 'dsfsfsddf';
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->setValid($isValid3);

    }
//
    public function testGetAndSetMessage()
    {

        $message = 'Valid.';
        $result = new \Tuersteher\Result\Validator(true, $message);
        $this->assertEquals($message, $result->getMessage());
        $message2 = 'Not Valid.';
        $result->setMessage($message2);
        $this->assertEquals($message2, $result->getMessage());
        $message3 = array();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->setMessage($message3);

    }

    public function testIsValid()
    {

        $isValid = true;
        $result = new \Tuersteher\Result\Validator($isValid);
        $this->assertEquals($isValid, $result->isValid());

        $isValid2 = false;
        $result->setValid($isValid2);
        $this->assertEquals($isValid2, $result->isValid());

    }

    public function testIsValidException()
    {
        
        $result = new \Tuersteher\Result\Validator();
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        $result->isValid();

    }

    public function testNoMessageException()
    {

        $result = new \Tuersteher\Result\Validator();
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        $noFail = "$result";
        $result->getMessage();

    }
}
