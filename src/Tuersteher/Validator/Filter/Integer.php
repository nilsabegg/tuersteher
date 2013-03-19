<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator\Filter;

use \Tuersteher\Exception\Filter as FilterException;
use \Tuersteher\Validator\Filter as FilterValidator;
use \Tuersteher\Exception\InvalidArgument as InvalidArgumentException;

/**
 * Email
 *
 * This class validates if a given value is an integer.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Filter
 * @category    Validation
 * @link        http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
 * @link        http://www.w3schools.com/php/filter_validate_int.asp    W3Schools Documentation
 */
class Integer extends FilterValidator
{

    /**
     * filter
     *
     * Holds the filter id for filter_var.
     *
     * @access  protected
     * @link    http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
     * @link    http://www.w3schools.com/php/filter_validate_int.asp    W3Schools Documentation
     * @var     integer
     */
    protected $filter = \FILTER_VALIDATE_INT;

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
        'default' => 'The input was not an integer.'
    );

    /**
     * getMax
     *
     *
     *
     * @access public
     * @return string
     */
    public function getMax()
    {

        if (isset($this->options['max_range']) == true) {
            return $this->options['max_range'];
        } else {
            throw new FilterException('The maximum value is not set.');
        }

    }

    /**
     * getMax
     *
     *
     *
     * @access public
     * @return string
     */
    public function getMin()
    {

        if (isset($this->options['min_range']) == true) {
            return $this->options['min_range'];
        } else {
            throw new FilterException('The minimum value is not set.');
        }

    }

    /**
     * isOctalAllowed
     *
     *
     *
     * @access public
     * @return boolean
     */
    public function isHexAllowed()
    {
        if (isset($this->flags['hex_allowed']) == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * isOctalAllowed
     *
     *
     *
     * @access public
     * @return boolean
     */
    public function isOctalAllowed()
    {
        if (isset($this->flags['octal_allowed']) == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * setMax
     *
     *
     *
     * @access public
     * @param  string   $max
     * @return void
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function setMax($max)
    {

        if ($max == '') {
            unset($this->options['max_range']);
        } elseif (is_int($max) == true) {
            $this->options['max_range'] = $max;
        } else {
            throw new InvalidArgumentException('The passed maximum value is not an integer.');
        }

    }

    /**
     * setMin
     *
     *
     *
     * @access public
     * @param  string   $min
     * @return void
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function setMin($min)
    {

        if ($min == '') {
            unset($this->options['min_range']);
        } elseif (is_int($min) == true) {
            $this->options['min_range'] = $min;
        } else {
            throw new InvalidArgumentException('The passed minimum value is not an integer.');
        }

    }

    /**
     * setHexAllowed
     *
     *
     *
     * @access public
     * @param  boolean  $hexAllowed
     * @return void
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function setHexAllowed($hexAllowed = true)
    {

        if ($hexAllowed === true) {
            $this->flags['hex_allowed'] = \FILTER_FLAG_ALLOW_HEX;
        } elseif ($hexAllowed === false) {
            unset($this->flags['hex_allowed']);
        } else {
            throw new InvalidArgumentException('The passed argument is not a boolean.');
        }
    }

    /**
     * setOctalAllowed
     *
     *
     *
     * @access public
     * @param  boolean  $octalAllowed
     * @return void
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function setOctalAllowed($octalAllowed = true)
    {

        if ($octalAllowed === true) {
            $this->flags['octal_allowed'] = \FILTER_FLAG_ALLOW_OCTAL;
        } elseif ($octalAllowed === false) {
            unset($this->flags['octal_allowed']);
        } else {
            throw new InvalidArgumentException('The passed argument is not a boolean.');
        }
    }
}
