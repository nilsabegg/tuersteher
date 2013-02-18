<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Test;

use \Tuersteher\Exception\Result as ResultException;
use \Tuersteher\Interfaces\Result as ResultInterface;

class ValidatorResult implements ResultInterface
{

    protected $isValid = null;

    protected $message = '';

    public function __construct($isValid = null, $message = '')
    {

        $this->setValid($isValid);
        $this->setMessage($message);

    }

    public function __toString()
    {

        try {
            $message = $this->createMessage();
            return $message;
        } catch (\Tuersteher\Exception\Result $e) {
            return '';
        }


    }

    public function __invoke()
    {

        return $this->isValid();

    }

    public function getMessage()
    {

        $message = $this->createMessage();

        return $message;

    }

    public function isValid()
    {

        return $this->isValid;

    }

    public function setValid($isValid)
    {

        $this->isValid = $isValid;

    }

    public function setMessage($message)
    {

        $this->message = $message;

    }

    protected function createMessage()
    {

        if ($this->message != '') {
            $message = $this->message;
        } elseif ($this->isValid === true) {
            $message = 'Is valid.';
        } elseif ($this->isValid === false) {
            $message = 'Is not valid.';
        } else {
            throw new ResultException('The result object is missing a message and the actual result');
        }

        return $message;

    }
}
