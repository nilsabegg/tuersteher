<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use \Tuersteher\Exception\InvalidArgument as InvalidArgumentException;
use \Tuersteher\Exception\Validator as ValidatorException;
use \Tuersteher\Interfaces\Validator as ValidatorInterface;

/**
 * Validator
 *
 * This class validates if a given value is a URL.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @category    Validation
 */
abstract class Validator implements ValidatorInterface
{

    /**
     * messages
     *
     * Holds the messages for for invalid input in
     * an array.
     *
     * @access  protected
     * @var     array
     */
    protected $messages = array();

    /**
     * result
     *
     * Holds the result object of the validator.
     *
     * @access  protected
     * @var     \Tuersteher\Interfaces\Result
     */
    protected $result = null;

    /**
     * resultClass
     *
     * Holds the class name of the result object.
     *
     * @access  protected
     * @var     \Tuersteher\Interfaces\Result
     */
    protected $resultClass = '\\Tuersteher\\Result\\Validator';

    /**
     * addMessage
     *
     *
     *
     * @access  public
     * @param   string $name
     * @param   string $message
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function addMessage($name, $message)
    {

        if (key_exists($name, $this->messages) == false) {
            $this->messages[$name] = $message;
        } else {
            throw new InvalidArgumentException('Message "' . $name . '" allready exists');
        }

    }

    /**
     * getMessage
     *
     *
     *
     * @access  public
     * @param   string $name
     * @return  string
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function getMessage($name = 'default')
    {

        if (key_exists($name, $this->messages) == true) {

            return $this->messages[$name];
        } else {
            throw new InvalidArgumentException('Message "' . $name . '" doesn\'t exist');
        }

    }

    /**
     * getMessages
     *
     *
     *
     * @access  public
     * @return  array
     * @throws  \Tuersteher\Exception\Validator
     */
    public function getMessages()
    {

        if (count($this->messages) > 0) {

            return $this->messages;
        } else {
            throw new ValidatorException('No messages set.');
        }

    }

    public function getResult()
    {

        if (isset($this->result) == true) {
            return $this->result;
        } else {
            throw new ValidatorException('No Result set.');
        }
        
    }

    /**
     * isValid
     *
     *
     *
     * @access  public
     * @param   mixed $value
     * @return  boolean
     * @throws  \Tuersteher\Exception\Validator
     */
    public function isValid($value = '')
    {

        if ($value === '') {

            return $this->result->isValid();
        } else {

            return $this->validate($value)->isValid();
        }

    }
    /**
     * setMessage
     *
     *
     *
     * @access  public
     * @param   string $message
     * @param   string $messageKey
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function setMessage($message, $messageKey = 'default')
    {

        if (key_exists($messageKey, $this->messages) == true) {
            $this->messages[$messageKey] = $message;
        } else {
            throw new InvalidArgumentException();
        }

    }

    /**
     * setMessages
     *
     *
     *
     * @access  public
     * @param   array   $messages
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function setMessages($messages)
    {

        if (is_array($messages) == true) {
            $this->messages = $messages;
        } else {
            throw new InvalidArgumentException('The messages are expected as array');
        }

    }

    /**
     * setResult
     *
     * Sets a custom result object for the validator.
     *
     * @access  public
     * @param   \Tuersteher\Interfaces\Result   $result
     * @return  void
     */
    public function setResult(\Tuersteher\Interfaces\Result $result)
    {

        $this->result = $result;

    }

    /**
     * createResult
     *
     * Creates the result object which is returned by the validator.
     *
     * @access  protected
     * @param   boolean $isValid
     * @param   string  $message
     * @return  \Tuersteher\Interfaces\Result
     * @throws  \Tuersteher\Exception\Validator
     */
    protected function createResult($isValid, $message = '')
    {

        try {
            $result = $this->result;
            $result->setIsValid($isValid);
            $result->setMessage($message);

            return $result;
        } catch (\Tuersteher\Exception\Result $e) {
            throw new ValidatorException('\\Tuersteher\\Exception\\Result was thrown and catched.', 0, $e);
        }

    }
}
