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
 * This class validates if a given value is a float.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Filter
 * @category    Validation
 * @link        http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
 * @link        http://www.w3schools.com/php/filter_validate_float.asp  W3Schools Documentation
 */
class Float extends FilterValidator
{

    /**
     * filter
     *
     * Holds the filter id for filter_var.
     *
     * @access  protected
     * @link    http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
     * @link    http://www.w3schools.com/php/filter_validate_float.asp  W3Schools Documentation
     * @var     integer
     */
    protected $filter = \FILTER_VALIDATE_FLOAT;

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
        'default' => 'The input was not a float.'
    );

    /**
     * getDecimalSeperator
     *
     *
     *
     * @access public
     * @return string
     */
    public function getDecimalSeperator()
    {

        if (isset($this->options['decimal']) == true) {
            return $this->options['decimal'];
        } else {
            throw new FilterException('The decimal seperator is not set.');
        }

    }

    /**
     * isThousandsSeperatorAllowed
     *
     *
     *
     * @access public
     * @return boolean
     */
    public function isThousandsSeperatorAllowed()
    {

        if (isset($this->flags['thousands_seperator_allowed']) == true) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * setDecimalSeperator
     *
     *
     *
     * @access public
     * @param  string   $seperator
     * @return void
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function setDecimalSeperator($seperator)
    {

        if ($seperator == '') {
            unset($this->options['decimal']);
        } elseif (is_string($seperator) == true) {
            $this->options['decimal'] = $seperator;
        } else {
            throw new InvalidArgumentException('The passed seperator is not a string.');
        }

    }

    /**
     * setThousandSeperatorAllowed
     *
     *
     *
     * @access public
     * @param  boolean  $isAllowed
     * @return void
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function setThousandsSeperatorAllowed($isAllowed = true)
    {

        if ($isAllowed === true) {
            $this->flags['thousands_seperator_allowed'] = \FILTER_FLAG_ALLOW_THOUSAND;
        } elseif ($isAllowed === false) {
            unset($this->flags['thousands_seperator_allowed']);
        } else {
            throw new InvalidArgumentException('The passed argument is not a boolean.');
        }

    }
}
