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

    /**
     * setMaxLength
     *
     *
     *
     * @access public
     * @param  integer $maxLength
     * @return \Tuersteher\Validator\Custom\String
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function setMaxLength($maxLength)
    {

        if (is_integer($maxLength) == true) {
            return $this;
        } elseif ($maxLength == '') {

        } else {
            throw new \InvalidArgumentException();
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
        
    }
}
