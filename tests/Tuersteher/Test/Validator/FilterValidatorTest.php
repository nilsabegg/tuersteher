<?php

namespace Tuersteher\Test\Validator;

class FilterValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testAddOption()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Filter');
        $validator->addOption('option1', 1234);
        $validator->addOption('option2', '4321');
        $this->assertEquals($validator->getOption('option1'), 1234);
        $this->assertEquals($validator->getOption('option2'), '4321');
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->addOption('option1', 1234);

    }

    public function testGetOption()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Filter');
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->getOption('option2');

    }

    public function testSetOption()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Filter');
        $validator->addOption('option1', 1234);
        $validator->setOption('option1', '4321');
        $this->assertEquals($validator->getOption('option1'), '4321');
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->setOption('option2', '4321');

    }

    public function testGetOptions()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Filter');
        $this->setExpectedException('\\Tuersteher\\Exception\\Filter');
        $validator->getOptions();

    }

    public function testSetOptions()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Filter');
        $options = array(
            'option1' => 1234,
            'option2' => '4321'
        );
        $validator->setOptions($options);
        $this->assertEquals($validator->getOptions(), $options);
        $validator->setOptions(array());
        $this->setExpectedException('\\Tuersteher\\Exception\\Filter');
        $validator->setOptions('no array');

    }

    public function testGetFlag()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Filter');
        $this->setExpectedException('\\Tuersteher\\Exception\\Filter');
        $validator->getFlag();

    }

    public function testSetFlag()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Filter');
        $flag = 22;
        $validator->setFlag('flag', $flag);
        $this->assertEquals($validator->getFlag('flag'), $flag);
        $this->setExpectedException('\\Tuersteher\\Exception\\Filter');
        $validator->setFlag('no integer');

    }

    public function testIsValid()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Filter');


    }

}
