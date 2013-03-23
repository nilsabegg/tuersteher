<?php

namespace Tuersteher\Test;

class TuersteherTest extends \PHPUnit_Framework_TestCase
{

    public function testAdd()
    {

        $tuersteher = new \Tuersteher\Tuersteher();
        $tuersteher->add('name', '\\Tuersteher\\Validator\\Filter\\Url')->setQueryRequired();
        $tuersteher->add('name', '\\Tuersteher\\Validator\\Custom\\String')->maxLength(50);
        $tuersteher->add('name', '\\Tuersteher\\Validator\\Filter\\Integer')->isNot();
        $tuersteher->add('email', '\\Tuersteher\\Validator\\Filter\\Email')->isNotRequired();
        $result = $tuersteher->validate(array('name' => 'http://google.com?q=123'));
        $this->assertTrue($result());

        $tuersteher->add('integer', '\\Tuersteher\\Validator\\Filter\\Integer');
        $values = array(
            'name' => 'http://google.com',
            'email' => 'noEmail'
            );
        $result2 = $tuersteher->validate($values);
        $this->assertFalse($result2());

    }

    public function testCall()
    {

        $tuersteher = new \Tuersteher\Tuersteher();

        $result = $tuersteher->isUrl()->setQueryRequired()->validate('http://google.com?q=123');
        $this->assertTrue($result());

        $result2 = $tuersteher->isUrl()->setQueryRequired()->validate('http://google.com');
        $this->assertFalse($result2());

    }

    public function testCallException()
    {

        $tuersteher = new \Tuersteher\Tuersteher();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $tuersteher->noFunction();

    }

    public function testCallException2()
    {

        $tuersteher = new \Tuersteher\Tuersteher();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $tuersteher->isTuersteher();

    }
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
        $isValid1 = $schema->validate($values);
        $this->assertTrue($isValid1());
        $values2 = array(
            'url' => 'http://google.com',
            'email' => 'keineemailadresse',
            'age' => '5'
        );
        $isValid2 = $schema->validate($values2);
        $this->assertFalse($isValid2());

        $values3 = array(
            'url' => 'http://google.com?q=bla',
            'age' => '50'
        );
        $isValid3 = $schema->validate($values3);
        $this->assertFalse($isValid3());

        $values4 = array(
            'email' => 'test@example.org',
            'age' => '50'
        );
        $isValid4 = $schema->validate($values4);
        $this->assertTrue($isValid4());

        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $schema->validate($this);

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