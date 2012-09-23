<?php

/**
 * This file is part of the FFUF Türsteher library.
 */

namespace FFUF\Tuersteher;

/**
 * AbstractValidator
 *
 * This class validates if a given value is a URL.
 *
 * @author  Nils Abegg <rueckgrat@nilsabegg.de>
 * @version 0.1
 * @package Türsteher
 * @subpackage Validator
 * @category Validation
 */
abstract class AbstractValidator
{

    /**
     * messages
     *
     * Holds the messages for for invalid input in
     * an array.
     *
     * @access protected
     * @var mixed
     */
    protected $messages = array();

    /**
     * addMessage
     *
     *
     *
     * @access public
     * @param string $name
     * @param string $message
     * @return void
     * @throws Exception
     */
    public function addMessage($name, $message)
    {

        if (key_exists($name, $this->messages) == false) {
            $this->messages[$name] = $message;
        } else {
            throw new Exception();
        }

    }

    /**
     * getMessage
     *
     *
     * @access public
     * @param string $name
     * @return string
     * @throws Exception
     */
    public function getMessage($name)
    {

        if (key_exists($name, $this->messages) == true) {
            return $this->messages[$name];
        } else {
            throw new Exception();
        }

    }

    public function getMessages()
    {

        return $this->messages;

    }

    /**
     * setMessage
     *
     *
     *
     * @access public
     * @param string $name
     * @param string $message
     * @return void
     * @throws Exception
     */
    public function setMessage($name, $message)
    {

        if (key_exists($name, $this->messages) == true) {
            $this->messages[$name] = $message;
        } else {
            throw new Exception();
        }

    }

    /**
     * setMessages
     *
     *
     *
     * @access public
     * @param mixed $messages
     * @return void
     */
    public function setMessages($messages)
    {

        $this->messages = $messages;

    }

    /**
     * validate
     *
     *
     *
     * @abstract
     * @access public
     */
    abstract public function validate();

}
