<?php

namespace Tuersteher\Test\Validator\Regex;

class UrlTest extends \PHPUnit_Framework_TestCase
{

    public function testIsUrl()
    {

        $urlValidator = new \Tuersteher\Validator\Regex\Url();
        $isValid = $urlValidator->validate('dsfdfsdff');
        $this->assertFalse($isValid());
        $isValid2 = $urlValidator->validate('http://dsfdfsdff.de');
        $this->assertTrue($isValid2());
        $urlValidator->setFlag(FILTER_FLAG_QUERY_REQUIRED);
        $isValid3 = $urlValidator->validate('http://example.com');
        $this->assertFalse($isValid3());

    }

}
