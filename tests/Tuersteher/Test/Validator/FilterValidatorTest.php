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

    }

    public function testSetOption()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $validator->addOption('option1', 1234);
        $validator->setOption('option1', '4321');
        $this->assertEquals($validator->getOption('option1'), '4321');

    }

    public function testSetOptions()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $options = array(
            'option1' => 1234,
            'option2' => '4321'
        );
        $validator->setOptions($options);
        $this->assertEquals($validator->getOptions(), $options);

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
