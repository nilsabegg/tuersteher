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

    public function testGetOption()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $this->setExpectedException('\\Tuersteher\\Validator\\ValidatorException');
        $validator->getOption('option2');

    }

    public function testSetOption()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $validator->addOption('option1', 1234);
        $validator->setOption('option1', '4321');
        $this->assertEquals($validator->getOption('option1'), '4321');
        $this->setExpectedException('\\Tuersteher\\Validator\\ValidatorException');
        $validator->setOption('option2', '4321');

    }

    public function testGetOptions()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $this->setExpectedException('\\Tuersteher\\Validator\\ValidatorException');
        $validator->getOptions();

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
        $validator->setOptions(array());
        $this->setExpectedException('\\Tuersteher\\Validator\\ValidatorException');
        $validator->setOptions('no array');

    }

    public function testGetFlag()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $this->setExpectedException('\\Tuersteher\\Validator\\ValidatorException');
        $validator->getFlag();

    }

    public function testSetFlag()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');
        $flag = 22;
        $validator->setFlag($flag);
        $this->assertEquals($validator->getFlag(), $flag);
        $this->setExpectedException('\\Tuersteher\\Validator\\ValidatorException');
        $validator->setFlag('no integer');

    }

    public function testIsValid()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\FilterValidator');


    }

}
