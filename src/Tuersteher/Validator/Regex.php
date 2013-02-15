<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use Tuersteher\Validator\Validator as Validator;
use Tuersteher\Exception\Regex as RegexException;

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
abstract class Regex extends Validator
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

        if ($method == 'preg' || $method == 'filter') {
            $this->method = $method;
        } else {
            throw new RegexException('Method must be "filter" or "preg".');
        }

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
    public function validate($value)
    {

        if ($this->method == 'preg') {
            $result = $this->isValidPreg($value);
        } elseif ($this->method == 'filter') {
            $result = $this->isValidFilter($value);
        }
        $this->result = $result;

        return $this->result;

    }

    /**
     * isValidFilter
     *
     *
     *
     * @access  protected
     * @param   mixed   $value
     * @return  \Tuersteher\Result
     */
    protected function isValidFilter($value)
    {

        $validator = new \Tuersteher\Validator\Filter\Regexp;
        $options = array(
            'regexp' => $this->regex
        );
        $validator->setOptions($options);
        $result = $validator->validate($value);

        return $result;

    }

    /**
     * isValidPreg
     *
     *
     *
     * @access  protected
     * @param   mixed   $value
     * @return  \Tuersteher\Result
     */
    protected function isValidPreg($value)
    {

        $isValid = preg_match($this->regex, $value);
        if ($isValid != false) {
            $this->result = $this->createResult(true, $this->messages['default']);
        } else {
            $this->result = $this->createResult(false, $this->messages['default']);
        }

        return $this->result;

    }
}
