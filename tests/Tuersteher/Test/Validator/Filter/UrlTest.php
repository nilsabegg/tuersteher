<?php

namespace Tuersteher\Test\Validator\Filter;

class UrlTest extends \PHPUnit_Framework_TestCase
{

    public function testIsUrl()
    {
        $urlValidator = new \Tuersteher\Validator\Filter\Url();
        $isValid = $urlValidator->isValid('dsfdfsdff');
        $this->assertFalse($isValid);
        $isValid2 = $urlValidator->isValid('http://dsfdfsdff.de');
        $this->assertTrue($isValid2);
        $urlValidator->setFlag(FILTER_FLAG_QUERY_REQUIRED);
        $isValid3 = $urlValidator->isValid('http://example.com');
        $this->assertFalse($isValid3);

    }

}