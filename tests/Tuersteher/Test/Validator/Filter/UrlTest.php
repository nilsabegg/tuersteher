<?php

namespace Tuersteher\Test\Validator\Filter;

class UrlTest extends \PHPUnit_Framework_TestCase
{

    public function testIsUrl()
    {

        $result = new \Tuersteher\Result\Validator();
        $validator = new \Tuersteher\Validator\Filter\Url();
        $validator->setResult($result);
        $url1 = 'http://www.example.org';
        $isValid1 = $validator->validate($url1);
        $url2 = 'google.com';
        $isValid2 = $validator->validate($url2);
        $this->assertTrue($isValid1->isValid());
        $this->assertFalse($isValid2());

        $queryRequired = $validator->isQueryRequired();
        $this->assertFalse($queryRequired);
        $validator->setQueryRequired(true);
        $queryRequired2 = $validator->isQueryRequired();
        $this->assertTrue($queryRequired2);

        $isValid3 = $validator->validate($url1);
        $this->assertFalse($isValid3());
        $url3 = 'http://google.com?q=search';
        $isValid4 = $validator->validate($url3);
        $this->assertTrue($isValid4());

        $pathRequired = $validator->isPathRequired();
        $this->assertFalse($pathRequired);
        $validator->setPathRequired(true);
        $pathRequired2 = $validator->isPathRequired();
        $this->assertTrue($pathRequired2);
        $isValid5 = $validator->validate($url3);
        $this->assertFalse($isValid5());
        $url4 = 'http://google.com/path/?q=search';
        $isValid6 = $validator->validate($url4);
        $isValid7 = $validator->isValid();
        $isValid8 = $validator->isValid($url4);
        $this->assertTrue($isValid6());
        $this->assertTrue($isValid7);
        $this->assertTrue($isValid8);
        $validator->setQueryRequired(false);
        $queryRequired3 = $validator->isQueryRequired();
        $this->assertFalse($queryRequired3);

        $validator->setPathRequired(false);
        $pathRequired3 = $validator->isPathRequired();
        $this->assertFalse($pathRequired3);

    }

    public function testSetPathRequiredException()
    {

        $validator = new \Tuersteher\Validator\Filter\Url();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->setPathRequired(array());

    }

    public function testSetQueryRequiredException()
    {

        $validator = new \Tuersteher\Validator\Filter\Url();
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->setQueryRequired(array());

    }
}