<?php

namespace Tuersteher\Test;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAndSetIsValid()
    {

        $isValid = true;
        $result = new \Tuersteher\Result($isValid);
        $this->assertEquals($isValid, $result->getIsValid());
        $isValid2 = false;
        $result->setIsValid($isValid2);
        $this->assertEquals($isValid2, $result->getIsValid());
        $isValid2 = 'dsfsfsddf';
        $this->setExpectedException('\\Tuersteher\\Exception');
        $result->setIsValid($isValid2);

    }

    public function testGetOption()
    {


    }

    public function testIsValid()
    {



    }

}
