<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher;

use Tuersteher\Exception as Exception;

/**
 * Result
 *
 * This class is a result of Türsteher validator.
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
        } else {
//            throw new Exception();
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
    public function getResult()
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
            throw new Exception();
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

        $this->message = $message;

    }

    /**
     * setResult
     *
     * Set the result.
     *
     * @access  public
     * @param   boolean $result
     * @throws  \Tuersteher\Exception
     */
    public function setResult($result)
    {

        if (is_bool($result)) {
            $this->result = $result;
        } else {
            throw new Exception();
        }

    }

}
