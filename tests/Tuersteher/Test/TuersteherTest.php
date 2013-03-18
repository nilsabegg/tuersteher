<?php

namespace Tuersteher\Test;

class TuersteherTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateSchemaFromYaml()
    {

        $yamlParser = new \Symfony\Component\Yaml\Parser();
        $yaml = $yamlParser->parse(file_get_contents(__DIR__ . '/testSchema.yml'));
        $tuersteher = new \Tuersteher\Tuersteher();
        $validatorResult = new \Tuersteher\Test\ValidatorResult();
        $tuersteher->setValidatorResult($validatorResult);
        $schemaResult = new \Tuersteher\Test\SchemaResult();
        $tuersteher->setSchemaResult($schemaResult);
        $schema = $tuersteher->createSchemaFromYaml($yaml);
        $this->assertInstanceOf('\\Tuersteher\\Validator\\Schema', $schema);
        $values = array(
            'url' => 'http://google.com?q=bla',
            'email' => 'test@example.org',
            'age' => '50'
        );
        $result = $schema->validate($values);
        $this->assertTrue($result());

    }
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
    public function testSchema()
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

        $result = new \Tuersteher\Result\Validator();
        $validator = new \Tuersteher\Test\Validator();
        $validator->setResult($result);
        $this->setExpectedException('\\Tuersteher\\Exception\\Validator');
        $isValid = $validator->validate('http://google.com');

    }

}