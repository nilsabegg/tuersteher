<?php

namespace Tuersteher\Test\Result;

class SchemaTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {

        $isValid = true;
        $message = 'Valid.';
        $result1 = new \Tuersteher\Result\Validator(true);
        $result2 = new \Tuersteher\Result\Validator(true);
        $results = array (
            'result1' => $result1,
            'result2' => $result2
        );
        $result = new \Tuersteher\Result\Schema($isValid, $message, $results);
        $this->assertEquals($isValid, $result->isValid());
        $this->assertEquals($message, $result->getMessage());
        $this->assertEquals($results, $result->getResults());
        $results2 = 324;
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        new \Tuersteher\Result\Validator($isValid, $message, $results2);

    }

    public function testToString()
    {

        $result = new \Tuersteher\Result\Schema(true);
        $this->assertEquals("$result", 'Is valid.');
        $result->setIsValid(false);
        $this->assertEquals("$result", 'Is not valid.');
        $result->setMessage('Blabla');
        $this->assertEquals("$result", 'Blabla');
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        new \Tuersteher\Result\Schema(true, array());

    }

    public function testGetAndSetIsValid()
    {

        $isValid = true;
        $result = new \Tuersteher\Result\Schema($isValid);
        $this->assertEquals($isValid, $result->isValid());
        $isValid2 = false;
        $result->setIsValid($isValid2);
        $this->assertEquals($isValid2, $result->isValid());
        $isValid3 = 'dsfsfsddf';
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->setIsValid($isValid3);

    }
//
    public function testGetAndSetMessage()
    {

        $message = 'Valid.';
        $result = new \Tuersteher\Result\Schema(true, $message);
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
        $result = new \Tuersteher\Result\Schema($isValid, 'Valid.');
        $this->assertEquals($result->isValid(), $isValid);
        $isValid2 = false;
        $result->setIsValid($isValid2);
        $this->assertEquals($isValid2, $result->isValid());
        $result2 = new \Tuersteher\Result\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        $result2->isValid();

    }

    public function testNoMessageException()
    {

        $result = new \Tuersteher\Result\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        $noFail = "$result";
        $result->getMessage();

    }
}
