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
        new \Tuersteher\Result\Schema($isValid, $message, $results2);

    }

    public function testGetAndSetResult()
    {

        $result1 = new \Tuersteher\Result\Validator(true);
        $result2 = new \Tuersteher\Result\Validator(false);
        $result = new \Tuersteher\Result\Schema();
        $result->addResult('result1', $result1);
        $this->assertEquals($result->getResult('result1'), $result1);
        $result->setResult('result1', $result2);
        $this->assertEquals($result->getResult('result1'), $result2);
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->addResult('result1', $result1);

    }
    public function testGetResultException()
    {

        $result = new \Tuersteher\Result\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->getResult('result1');

    }
    public function testGetResultsException()
    {

        $result = new \Tuersteher\Result\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        $result->getResults();

    }
    public function testSetResultException()
    {

        $result = new \Tuersteher\Result\Schema();
        $result1 = new \Tuersteher\Result\Validator(true);
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $result->setResult('result1', $result1);

    }
    public function testIsValid()
    {

        $isValid = true;
        $result = new \Tuersteher\Result\Schema($isValid, 'Valid.');
        $this->assertEquals($result->isValid(), $isValid);
        $isValid2 = false;
        $result->setValid($isValid2);
        $this->assertEquals($isValid2, $result->isValid());
        $result2 = new \Tuersteher\Result\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\Result');
        $result2->isValid();

    }

}
