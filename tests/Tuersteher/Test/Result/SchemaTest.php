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

}
