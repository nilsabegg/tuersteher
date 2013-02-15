<?php

namespace Tuersteher\Test\Validator\Regex;

class UrlTest extends \PHPUnit_Framework_TestCase
{

    public function testIsUrl()
    {

        $result = new \Tuersteher\Result\Validator();
        $validator = new \Tuersteher\Validator\Regex\Url();
        $validator->setResult($result);
        $url1 = 'http://www.example.org';
        $isValid1 = $validator->validate($url1);
        $url2 = 'google.com';
        $isValid2 = $validator->validate($url2);
        $this->assertTrue($isValid1->isValid());
        $this->assertFalse($isValid2());
        $validator->setQueryRequired(true);
        $isValid3 = $validator->validate($url1);
        $this->assertFalse($isValid3);
        $url3 = 'http://google.com?q=search';
        $isValid4 = $validator->validate($url3);
        $this->assertTrue($isValid4);

    }

}
