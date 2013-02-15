<?php

namespace Tuersteher\Test\Validator\Filter;

class UrlTest extends \PHPUnit_Framework_TestCase
{

    public function testIsUrl()
    {

        $result = new \Tuersteher\Result\Validator();
        $validator = new \Tuersteher\Validator\Filter\Url();
        $validator->setResult($result);
        $url1 = 'http://google.com';
        $isValid1 = $validator->validate($url1);
        $url2 = 'google.com';
        $isValid2 = $validator->validate($url2);
        $this->assertTrue($isValid1());
        $this->assertFalse($isValid2());

    }

}