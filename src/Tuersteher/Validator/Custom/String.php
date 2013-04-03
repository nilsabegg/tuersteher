<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator\Custom;

use Tuersteher\Validator\Validator as Validator;

/**
 * Email
 *
 * This class validates if a given value is a boolean.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Filter
 * @category    Validation
 * @link        http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
 * @link        http://www.w3schools.com/php/filter_validate_boolean.asp    W3Schools Documentation
 */
class String extends Validator
{

    protected $options = array(
        'maxLength' => array(
            'length' => null
        ),
        'minLength' => array(
            'length' => null
        )
    );
    /**
     * messages
     *
     * Holds the messages for for invalid input in
     * an array.
     *
     * @access  protected
     * @var     array
     */
    protected $messages = array(
        'default' => 'The input was not a boolean.'
    );

    protected $methods = array(
        'maxLength' => false,
        'minLength' => false
    );

    /**
     * maxLength
     *
     *
     *
     * @access public
     * @param  integer $maxLength
     * @return \Tuersteher\Validator\Custom\String
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function maxLength($maxLength)
    {

        if (is_integer($maxLength) == true) {
            $this->methods['maxLength'] = true;
            $this->options['maxLength']['length'] = $maxLength;

            return $this;
        } elseif ($maxLength == '') {
            $this->methods['maxLength'] = false;
            $this->options['maxLength']['length'] = null;

            return $this;
        } else {
            throw new \InvalidArgumentException('The maximum length has to be an integer.');
        }

    }

    /**
     * minLength
     *
     *
     *
     * @access public
     * @param  integer $minLength
     * @return \Tuersteher\Validator\Custom\String
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function minLength($minLength)
    {

        if (is_integer($minLength) == true) {
            $this->methods['minLength'] = true;
            $this->options['minLength']['length'] = $minLength;

            return $this;
        } elseif ($minLength == '') {
            $this->methods['minLength'] = false;
            $this->options['minLength']['length'] = null;

            return $this;
        } else {
            throw new \InvalidArgumentException('The minimum length has to be an integer.');
        }

    }

    /**
     * validate
     *
     * Checks if the input is valid.
     *
     * @access  public
     * @param   mixed   $value
     * @return  \Tuersteher\Interfaces\Result
     */
    public function validate($value)
    {

        $hasError = false;
        foreach ($this->methods as $methodName => $isActive) {
            if ($isActive == true) {
                $validationMethodName = 'validate' . ucfirst($methodName);
                $hasError = $this->$validationMethodName($value);
            }
        }
        return $this->createResult(true, 'Dummy valid Result.');

    }

    protected function validateMaxLength($value)
    {

        if (strlen($value) <= $this->options['maxLenght']['length']) {
            return true;
        } else {
            return false;
        }

    }

    protected function validateMinLength($value)
    {

        if (strlen($value) >= $this->options['minLenght']['length']) {
            return true;
        } else {
            return false;
        }

    }
}
