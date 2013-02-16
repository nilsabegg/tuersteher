<?php

namespace Tuersteher\Test;

class TuersteherTest extends \PHPUnit_Framework_TestCase
{

    public function testTuersteher()
    {

        $tuersteher = new \Tuersteher\Tuersteher();
        $validatorResult = new \Tuersteher\Test\ValidatorResult();
        $tuersteher->setValidatorResult($validatorResult);
        $schemaResult = new \Tuersteher\Test\SchemaResult();
        $tuersteher->setSchemaResult($schemaResult);
        $className = '\\Tuersteher\\Validator\\Filter\\Url';
        $validator = $tuersteher->create($className);
        $this->assertInstanceOf($className, $validator);

    }

    public function testMessagesBadExtendedValidator()
    {

        $result = new \Tuersteher\Test\ValidatorResult();
        $validator = new \Tuersteher\Test\Validator();
        $validator->setResult($result);
        $this->setExpectedException('\\Tuersteher\\Exception\\Validator');
        $validator->getMessages();

    }

    public function testResultBadExtendedValidator()
    {

        $result = new \Tuersteher\Test\ValidatorResult();
        $validator = new \Tuersteher\Test\Validator();
        $validator->setResult($result);
        $this->setExpectedException('\\Tuersteher\\Exception\\Validator');
        $validator->validate('http://google.com');

    }

}