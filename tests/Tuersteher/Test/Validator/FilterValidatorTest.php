<?php

namespace Tuersteher\Test\Validator;

class FilterValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testAddOption()
    {
        
        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $validator->addOption('option1', 1234);
        $validator->addOption('option2', '4321');
        $this->assertEquals($this->getOption('option1'), 1234);
        $this->assertEquals($this->getOption('option2'), '4321');

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
