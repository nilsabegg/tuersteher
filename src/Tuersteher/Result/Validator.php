<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Result;

use Tuersteher\Exception\Result as ResultException;
use Tuersteher\Interfaces\Result as ResultInterface;
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

    /**
     * __construct
     *
     * Constructs the object.
     *
     * @access public
     * @param  boolean  $isValid
     * @param  string   $message
     * @return void
     * @throws \Tuersteher\Exception\Result
     */
    public function __construct($isValid = null, $message = '')
    {

        if (is_bool($isValid) == true || $isValid == null) {
            $this->isValid = $isValid;
        } else {
            throw new ResultException('The given result is not a boolean');
        }
        if (is_string($message) == true || $message == '') {
            $this->message = $message;
        } else {
            throw new ResultException('The given message is not a string or integer.');
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
            $string = $this->message;
        } elseif ($this->isValid == true) {
            $string = 'Is valid.';
        } else if ($this->isValid == false) {
            $string = 'Is not valid.';
        }

        return $string;

    }

    /**
     * __invoke
     *
     * Returns the wheter the result is valid or not valid
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
     * setMessage
     *
     * Set the message of the result.
     *
     * @access  public
     * @param   string  $message
     * @return  void
     * @throws  \Tuersteher\Exception\Result
     */
    public function setMessage($message)
    {
        if (is_string($message) == true) {
            $this->message = $message;
        } else {
            throw new ResultException('The given message is not a string or integer.');
        }
    }

    /**
     * setResult
     *
     * Set the result.
     *
     * @access  public
     * @param   boolean $isValid
     * @throws  \Tuersteher\Exception\Result
     */
    public function setIsValid($isValid)
    {

        if (is_bool($isValid)) {
            $this->isValid = $isValid;
        } else {
            throw new ResultException('The given result is not a boolean');
        }

    }

}
