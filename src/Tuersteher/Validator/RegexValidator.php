<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

/**
 * RegexValidator
 *
 * This class validates if a given value is a URL.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Regex
 * @category    Validation
 */
abstract class RegexValidator extends Validator
{

    /**
     * regex
     *
     * Holds the Regular Expression.
     *
     * @access  protected
     * @var     string
     */
    protected $regex = '';

    /**
     * method
     *
     * Specifies the method to execute the
     * Regular Expression.
     *
     * @access  protected
     * @var     string
     */
    protected $method = 'preg';

    /**
     * getMethod
     *
     * Returns the method to execute the
     * Regular Expression.
     *
     * @access  public
     * @return  string
     */
    public function getMethod()
    {

        return $this->method;

    }

    /**
     * setMethod
     *
     * Set the method to execute the
     * Regular Expression.
     *
     * @access  public
     * @param   string  $method
     * @return  void
     */
    public function setMethod($method)
    {

        $this->method = $method;

    }

    /**
     * validate
     *
     *
     *
     * @param   mixed   $value
     * @return  boolean
     * @throws  \Tuersteher\Validator\Exception
     */
    public function isValid($value)
    {

        if ($this->method == 'preg') {
            $isValid = $this->isValidPreg($value);
        } elseif ($this->method == 'filter') {
            $isValid = $this->isValidFilter($value);
        } else {
            throw new Exception('Validation method "' . $this->method . '" is unknown.');
        }

        return $isValid;

    }

    /**
     * isValidFilter
     *
     *
     *
     * @access  protected
     * @param   mixed   $value
     * @return  boolean
     */
    protected function isValidFilter($value)
    {

        $isValid = $value;

        return $isValid;

    }

    /**
     * isValidPreg
     *
     *
     *
     * @access  protected
     * @param   mixed   $value
     */
    protected function isValidPreg($value)
    {

        $isValid = $value;

        return $isValid;

    }

}
