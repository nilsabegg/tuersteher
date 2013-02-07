<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher;

use Tuersteher\Exception as Exception;

/**
 * Result
 *
 * This class is a result of a Türsteher validator.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Türsteher
 * @category    Validation
 */
class Result
{

    /**
     * isValid
     *
     * Holds the actual result of the result.
     *
     * @access  protected
     * @var     boolean
     */
    protected $isValid = null;

    /**
     * message
     *
     * Holds the message of the result.
     *
     * @access  protected
     * @var     string
     */
    protected $message = '';


    public function __construct($isValid = null, $message = '')
    {

        if (is_bool($isValid) == true || $isValid == null) {
            $this->isValid = $isValid;
        } else {
            throw new Exception('The given result is not a boolean');
        }
        if (is_string($message) == true || $message == '') {
            $this->message = $message;
        } else {
            throw new Exception('The given message is not a string or integer.');
        }

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

        if ($this->message != '') {
            return $this->message;
        } elseif ($this->isValid == true) {
            return 'Is valid.';
        } else if ($this->isValid == false) {
            return 'Is not valid.';
        }

    }

    /**
     * getMessage
     *
     * Returns the message of the result.
     *
     * @access  public
     * @return  string
     */
    public function getMessage()
    {

        return $this->message;

    }

    /**
     * getResult
     *
     * Returns the result.
     *
     * @access  public
     * @return  mixed
     */
    public function getIsValid()
    {

        return $this->isValid;

    }

    /**
     * isValid
     *
     * Returns the result if it is set.
     *
     * @access  public
     * @return  boolean
     * @throws  \Tuersteher\Exception
     */
    public function isValid()
    {

        if ($this->isValid != null) {
            return $this->isValid;
        } else {
            throw new Exception('There is no result set.');
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
     */
    public function setMessage($message)
    {
        if (is_string($message) == true) {
            $this->message = $message;
        } else {
            throw new Exception('The given message is not a string or integer.');
        }
    }

    /**
     * setResult
     *
     * Set the result.
     *
     * @access  public
     * @param   boolean $isValid
     * @throws  \Tuersteher\Exception
     */
    public function setIsValid($isValid)
    {

        if (is_bool($isValid)) {
            $this->isValid = $isValid;
        } else {
            throw new Exception('The given result is not a boolean');
        }

    }

}
