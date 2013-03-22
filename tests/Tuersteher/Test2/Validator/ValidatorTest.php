<?php

namespace Tuersteher\Test\Validator;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testAddMessage()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Validator');
        $message1 = 'This is message1';
        $validator->addMessage('message1', $message1);
        $message2 = 'This is message2';
        $validator->addMessage('message2', $message2);
        $this->assertEquals($validator->getMessage('message1'), $message1);
        $this->assertEquals($validator->getMessage('message2'), $message2);
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->addMessage('message1', $message2);

    }

    public function testGetMessage()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Validator');
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->getMessage('message1');

    }

    public function testGetMessages()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Validator');
        $messages = array (
            'message1' => 'This is message1',
            'message2' => 'This is message2'
        );
        $validator->setMessages($messages);
        $this->assertEquals($validator->getMessages(), $messages);
//        $this->setExpectedException('\\Tuersteher\\Exception\\Validator');
//        $validator2 = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Validator');
//        $validator2->getMessages();

    }

    public function testSetMessage()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Validator');
        $message1 = 'This is message 1.';
        $validator->setMessage($message1);
        $this->assertEquals($message1, $validator->getMessage());
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->setMessage('message1', 'This is message1');

    }

    public function testSetMessages()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Validator');
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $messages = 'This is message1';
        $validator->setMessages($messages);

    }
    public function testSetRequired()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Validator');
        $this->setExpectedException('\\Tuersteher\\Exception\\InvalidArgument');
        $validator->setRequired('message1');

    }
    public function testGetResult()
    {

        $validator = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Validator');
        $result = new \Tuersteher\Result\Validator();
        $validator->setResult($result);
        $resultReturned = $validator->getResult();
        $this->assertEquals($resultReturned, $result);

        $this->setExpectedException('\\Tuersteher\\Exception\\Validator');
        $validator2 = $this->getMockForAbstractClass('\\Tuersteher\\Validator\\Validator');
        $validator2->getResult();

    }
}