<?php

namespace Tuersteher\Test\Validator;

class FilterValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testAddOption()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $validator->addOption('option1', 1234);
        $validator->addOption('option2', '4321');
        $this->assertEquals($validator->getOption('option1'), 1234);
        $this->assertEquals($validator->getOption('option2'), '4321');
        $this->setExpectedException('\\Tuersteher\\Validator\\ValidatorException');
        $validator->addOption('option1', 1234);

    }

    public function testGetAndSetOption()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $validator->addOption('option1', 1234);
        $validator->setOption('option1', '4321');
        $this->assertEquals($validator->getOption('option1'), '4321');
        $this->setExpectedException('\\Tuersteher\\Validator\\ValidatorException');
        $validator->setOption('option2', '4321');
        $validator->getOption('option2');

    }

    public function testGetAndSetOptions()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $options = array(
            'option1' => 1234,
            'option2' => '4321'
        );
        $validator->setOptions($options);
        $this->assertEquals($validator->getOptions(), $options);
        $validator->setOptions(array());
        $this->setExpectedException('\\Tuersteher\\Validator\\ValidatorException');
        $validator->getOptions();
        $validator->setOptions('no array');

    }
//    public function testConcreteMethod()
//    {
//        $stub = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
//        $stub->expects($this->any())
//             ->method('abstractMethod')
//             ->will($this->returnValue(TRUE));
//
//        $this->assertTrue($stub->concreteMethod());
//    }

}
