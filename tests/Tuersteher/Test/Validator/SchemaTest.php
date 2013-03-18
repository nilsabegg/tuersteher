<?php

namespace Tuersteher\Test\Validator;

class SchemaTest extends \PHPUnit_Framework_TestCase
{

    public function testAddValidator()
    {

        $validator = new \Tuersteher\Validator\Filter\Url();
        $validator2 = new \Tuersteher\Validator\Regex\Url();
        $schema = new \Tuersteher\Validator\Schema();
        $schema->addValidator('url', $validator);
        $this->assertEquals($schema->getValidator('url'), $validator);
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $schema->addValidator('url', $validator);

    }
    public function testAddValidatorException()
    {

        $validator = new \Tuersteher\Validator\Filter\Url();
        $schema = new \Tuersteher\Validator\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $schema->addValidator('', $validator);

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
    public function testSetValidatorsException()
    {

        $validator = new \Tuersteher\Validator\Filter\Url();
        $validator2 = new \Tuersteher\Validator\Regex\Url();
        $schema = new \Tuersteher\Validator\Schema();
        $validators = array($validator, $validator2);
        $schema->setValidators($validators);
        $this->assertEquals($schema->getValidators(), $validators);
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $schema->setValidators($validator);

    }
    public function testSetValidatorException()
    {
        $validator = new \Tuersteher\Validator\Regex\Url();
        $schema = new \Tuersteher\Validator\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $schema->setValidator('1', $validator);

    }
    public function testSetValidatorException2()
    {
        $validator = new \Tuersteher\Validator\Regex\Url();
        $schema = new \Tuersteher\Validator\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $schema->setValidator('1', $validator);

    }
    public function testSetValidator()
    {
        $validator = new \Tuersteher\Validator\Regex\Url();
        $validator2 = new \Tuersteher\Validator\Filter\Url();
        $schema = new \Tuersteher\Validator\Schema();
        $schema->setValidator('1', $validator);
        $schema->setValidator('1', $validator2);

    }
    public function testGetValidators()
    {

        $schema = new \Tuersteher\Validator\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $schema->getValidators();

    }
    public function testGetValidatorException2()
    {

        $schema = new \Tuersteher\Validator\Schema();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $schema->getValidator('validator1');

    }

}
