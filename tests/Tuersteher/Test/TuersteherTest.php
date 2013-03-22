<?php

namespace Tuersteher\Test;

class TuersteherTest extends \PHPUnit_Framework_TestCase
{

    public function testFluentInterface()
    {

        $tuersteher = new \Tuersteher\Tuersteher();
        $tuersteher->add('name', '\\Tuersteher\\Validator\\Filter\\Url')->setQueryRequired();
        $tuersteher->add('name', '\\Tuersteher\\Validator\\Custom\\String')->maxLength(50);
        $className = '\\Tuersteher\\Validator\\Set';
        $this->assertInstanceOf($className, $tuersteher->getValidator('name'));

    }

    public function testFluentValidator()
    {

        $tuersteher = new \Tuersteher\Tuersteher();

        $result = $tuersteher->isUrl()->setQueryRequired()->validate('http://google.com?q=123');
        $this->assertTrue($result());

        $result2 = $tuersteher->isUrl()->setQueryRequired()->validate('http://google.com');
        $this->assertFalse($result2());

    }

}