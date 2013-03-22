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

    public function testGetAndSetIsValid()
    {

        $result = new \Tuersteher\Result\Validator();

        $isValid = true;
        $result->setValid($isValid2);
        $this->assertEquals($isValid, $result->isValid());

        $isValid2 = false;
        $result->setValid($isValid2);
        $this->assertEquals($isValid2, $result->isValid());

    }

    public function testGetAndSetMessage()
    {

        $result = new \Tuersteher\Result\Validator(true);

        $message = 'Valid.';
        $result->setMessage($message);
        $this->assertEquals($message, $result->getMessage());

        $message2 = 'Not Valid.';
        $result->setMessage($message2);
        $this->assertEquals($message2, $result->getMessage());

    }

    public function testGetMessageException()
    {

        $result = new \Tuersteher\Result\Validator();
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        $result->getMessage();

    }

    public function testInvoke()
    {

        $result = new \Tuersteher\Result\Validator();

        $isValid = true;
        $result->setValid($isValid);
        $this->assertEquals($isValid, $result());

        $isValid2 = false;
        $result->setValid($isValid2);
        $this->assertEquals($isValid2, $result());

    }

    public function testIsValid()
    {

        $result = new \Tuersteher\Result\Validator();

        $isValid = true;
        $result->setValid($isValid);
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

    public function testSetIsValidException()
    {

        $result = new \Tuersteher\Result\Validator();

        $isValid = 'dsfsfsddf';
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->setValid($isValid);

    }

    public function testSetMessageException()
    {

        $result = new \Tuersteher\Result\Validator(true);

        $message = array();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->setMessage($message);

    }

    public function testToString()
    {

        $result = new \Tuersteher\Result\Validator();

        $this->assertEquals("$result", '');

        $result->setValid(true);
        $this->assertEquals("$result", 'Is valid.');

        $result->setValid(false);
        $this->assertEquals("$result", 'Is not valid.');

        $result->setMessage('Blabla');
        $this->assertEquals("$result", 'Blabla');

    }
}
