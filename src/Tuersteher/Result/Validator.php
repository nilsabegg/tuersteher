<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Result;

use \Tuersteher\Exception\InvalidArgument as InvalidArgumentException;
use \Tuersteher\Exception\Result as ResultException;
use \Tuersteher\Interfaces\Result as ResultInterface;

/**
 * Validator
 *
 * This class is a result of a Türsteher validator.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Türsteher
 * @category    Validation
 */
class Validator implements ResultInterface
{

    /**
     * isValid
     *
     * Holds the actual result of the result object.
     *
     * @access  protected
     * @var     boolean
     */
    protected $isValid = null;

    /**
     * message
     *
     * Holds the message of the result object.
     *
     * @access  protected
     * @var     string
     */
    protected $message = '';

    /**
     * __construct
     *
     * Constructs the object.
     *
     * @access public
     * @param  boolean  $isValid
     * @param  string   $message
     * @return void
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function __construct($isValid = null, $message = '')
    {

        if ($isValid !== null) {
            $this->setIsValid($isValid);
        }
        $this->setMessage($message);

    }

    /**
     * __toString
     *
     * Returns the string which is used when the
     * result is used as a string.
     *
     * @access  public
     * @return  string
     */
    public function __toString()
    {

        try {
            $message = $this->createMessage();
            return $message;
        } catch (\Tuersteher\Exception\Result $e) {
            return '';
        }


    }

    /**
     * __invoke
     *
     * Returns the the result is valid or not valid
     * when the result object is used as method.
     * <code>
     * if ($result()) {
     *  //do blabla
     * }
     * </code>
     *
     * @access  public
     * @return  boolean
     */
    public function __invoke()
    {

        return $this->isValid();

    }

    /**
     * getMessage
     *
     * Returns the message of the result.
     *
     * @access  public
     * @return  string
     * @throws  \Tuersteher\Exception\Result
     */
    public function getMessage()
    {

        $message = $this->createMessage();

        return $message;

    }

    /**
     * isValid
     *
     * Returns the actual result if it is set.
     *
     * @access  public
     * @return  boolean
     * @throws  \Tuersteher\Exception\Result
     */
    public function isValid()
    {

        if ($this->isValid !== null) {
            return $this->isValid;
        } else {
            throw new ResultException('There is no result set.');
        }

    }

    /**
     * setIsValid
     *
     * Set the actual result of the result object.
     *
     * @access  public
     * @param   boolean $isValid
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function setIsValid($isValid)
    {

        if ($isValid === false || $isValid === true) {
            $this->isValid = $isValid;
        } else {
            throw new InvalidArgumentException('The given result is not a boolean');
        }

    }

    /**
     * setMessage
     *
     * Set the message of the result.
     *
     * @access  public
     * @param   string  $message
     * @return  void
     * @throws  Tuersteher\Exception\InvalidArgument
     */
    public function setMessage($message)
    {

        if (is_string($message) == true) {
            $this->message = $message;
        } else {
            throw new InvalidArgumentException('The given message is not a string.');
        }

    }

    /**
     * createResult
     *
     *
     *
     * @access  protected
     * @return  boolean
     * @throws  \Tuersteher\Exception\Result
     */
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
