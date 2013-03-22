<?php

namespace Tuersteher\Test\Result;

class ValidatorTest extends \Tuersteher\Test\Result\ValidatorTestAbstract
{

    protected $resultClass = '\\Tuersteher\\Result\\Validator';
    
    public function testConstruct()
    {

        $isValid = true;
        $message = 'Valid.';
        $result = new $this->resultClass($isValid, $message);
        $this->assertEquals($isValid, $result->isValid());
        $this->assertEquals($message, $result->getMessage());

    }

    public function testConstructException()
    {

        $isValid = 324;
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        new $this->resultClass($isValid);

    }

    public function testConstructException2()
    {

        $isValid = true;
        $message = array();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        new $this->resultClass($isValid, $message);

    }

    public function testGetAndSetIsValid()
    {

        $result = new $this->resultClass();

        $isValid = true;
        $result->setValid($isValid);
        $this->assertEquals($isValid, $result->isValid());

        $isValid2 = false;
        $result->setValid($isValid2);
        $this->assertEquals($isValid2, $result->isValid());

    }

    public function testGetAndSetMessage()
    {

        $result = new $this->resultClass(true);

        $message = 'Valid.';
        $result->setMessage($message);
        $this->assertEquals($message, $result->getMessage());

        $message2 = 'Not Valid.';
        $result->setMessage($message2);
        $this->assertEquals($message2, $result->getMessage());

    }

    public function testGetMessageException()
    {

        $result = new $this->resultClass();
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        $result->getMessage();

    }

    public function testInvoke()
    {

        $result = new $this->resultClass();

        $isValid = true;
        $result->setValid($isValid);
        $this->assertEquals($isValid, $result());

        $isValid2 = false;
        $result->setValid($isValid2);
        $this->assertEquals($isValid2, $result());

    }

    public function testIsValid()
    {

        $result = new $this->resultClass();

        $isValid = true;
        $result->setValid($isValid);
        $this->assertEquals($isValid, $result->isValid());

        $isValid2 = false;
        $result->setValid($isValid2);
        $this->assertEquals($isValid2, $result->isValid());

    }

    public function testIsValidException()
    {

        $result = new $this->resultClass();
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        $result->isValid();

    }

    public function testSetIsValidException()
    {

        $result = new $this->resultClass();

        $isValid = 'dsfsfsddf';
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->setValid($isValid);

    }

    public function testSetMessageException()
    {

        $result = new $this->resultClass(true);

        $message = array();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->setMessage($message);

    }

    public function testToString()
    {

        $result = new $this->resultClass();

        $this->assertEquals("$result", '');

        $result->setValid(true);
        $this->assertEquals("$result", 'Is valid.');

        $result->setValid(false);
        $this->assertEquals("$result", 'Is not valid.');

        $result->setMessage('Blabla');
        $this->assertEquals("$result", 'Blabla');

    }
}
