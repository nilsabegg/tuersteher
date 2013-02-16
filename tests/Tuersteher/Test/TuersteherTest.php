<?php

namespace Tuersteher\Test;

class TuersteherTest extends \PHPUnit_Framework_TestCase
{

    public function testMessagesBadExtendedValidator()
    {

        $result = new \Tuersteher\Test\ValidatorResult();
        $validator = new \Tuersteher\Test\Validator();
        $validator->setResult($result);
        $this->setExpectedException('\\Tuersteher\\Exception\\Validator');
        $validator->getMessages();

    }

}