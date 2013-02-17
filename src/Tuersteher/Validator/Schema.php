<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use Tuersteher\Exception as Exception;

/**
 * ValidationSchema
 *
 * This class validates if a given value is a URL.
 *
 * @author  Nils Abegg <rueckgrat@nilsabegg.de>
 * @version 0.1
 * @package Türsteher
 * @category Validation
 */
class Schema
{

    /**
     * validators
     *
     * Holds the validators in an array.
     *
     * @access  protected
     * @var     array
     */
    protected $validators = array();

    protected $messages = array(

    );

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
     * addValidator
     *
     *
     *
     * @access  public
     * @param   string $name
     * @param   \Tuersteher\ValidatorInterface $validator
     * @throws  \Tuersteher\Exception
     * @return  void
     */
    public function addValidator($name, \Tuersteher\ValidatorInterface $validator)
    {

        if ($name != '') {
            if (key_exists($name, $this->validators) == false) {
                $this->validators[$name] = $validator;
            } else {
                throw new Exception('Validator allready added.');
            }
        } else {
            throw new Exception('No name for Validator given.');
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
     * setValidator
     *
     *
     *
     * @access  public
     * @param   string $name
     * @param   \Tuersteher\Interfaces\Validator $validator
     * @throws  \Tuersteher\Exception
     * @return  void
     */
    public function setValidator($name, \Tuersteher\Interfaces\Validator $validator)
    {

        if ($name != '') {
            if (key_exists($name, $this->validators) == true) {
                $this->validators[$name] = $validator;
            } else {
                throw new Exception('Validator doesn\'t exists.');
            }
        } else {
            throw new Exception('No name for Validator given.');
        }

    }
}
