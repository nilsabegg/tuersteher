<?php

namespace Tuersteher\Test;

class TuersteherTest extends \PHPUnit_Framework_TestCase
{

    public function testAdd()
    {

        $tuersteher = new \Tuersteher\Tuersteher();
        $tuersteher->add('name', '\\Tuersteher\\Validator\\Filter\\Url')->setQueryRequired();
        $tuersteher->add('name', '\\Tuersteher\\Validator\\Custom\\String')->maxLength(50);
        $className = '\\Tuersteher\\Validator\\Set';
        $this->assertInstanceOf($className, $tuersteher->getValidator('name'));

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
}