<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher;

use Tuersteher\Exception as Exception;
use Tuersteher\ValidatorInterface as ValidatorInterface;

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
     * @var     \Tuersteher\Result
     */
    protected $result = null;

    /**
     * addMessage
     *
     *
     *
     * @access  public
     * @param   string $name
     * @param   string $message
     * @return  void
     * @throws  \Tuersteher\Exception
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
     *
     * @access  public
     * @param   string $name
     * @return  string
     * @throws  \Tuersteher\Exception
     */
    public function getMessage($name)
    {

        if (key_exists($name, $this->messages) == true) {
            return $this->messages[$name];
        } else {
            throw new Exception();
        }

    }

    /**
     * getMessages
     *
     *
     *
     * @access  public
     * @return  array
     */
    public function getMessages()
    {

        return $this->messages;

    }

    /**
     * getResult
     *
     *
     *
     * @access  public
     * @return  \Tuersteher\Result
     */
    public function getResult()
    {

        return $this->result;

    }

    /**
     * setMessage
     *
     *
     *
     * @access  public
     * @param   string $name
     * @param   string $message
     * @return  void
     * @throws  \Tuersteher\Exception
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
     * @access  public
     * @param   array   $messages
     * @return  void
     */
    public function setMessages($messages)
    {

        $this->messages = $messages;

    }

    /**
     * createResult
     *
     *
     *
     * @access  protected
     * @param   boolean $isValid
     * @param   string  $message
     * @return  \Tuersteher\Result
     */
    protected function createResult($isValid, $message = '')
    {

        $result = new \Tuersteher\Result();
        $result->setIsValid($isValid);
        $result->setMessage($message);

        return $result;

    }
    
}
