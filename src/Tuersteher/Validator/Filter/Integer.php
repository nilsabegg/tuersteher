<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator\Filter;

use Tuersteher\Validator\Filter as FilterValidator;

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

        if (isset($this->options['max']) == true) {
            return $this->options['max'];
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

        if (isset($this->options['min']) == true) {
            return $this->options['min'];
        } else {
            throw new FilterException('The minimum value is not set.');
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
            unset($this->options['max']);
        } elseif (is_int($max) == true) {
            $this->options['max'] = $seperator;
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
            unset($this->options['min']);
        } elseif (is_int($min) == true) {
            $this->options['min'] = $seperator;
        } else {
            throw new InvalidArgumentException('The passed minimum value is not an integer.');
        }

    }

}
