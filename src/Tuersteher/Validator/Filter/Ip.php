<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator\Filter;

use Tuersteher\Validator\FilterValidator as FilterValidator;

/**
 * Email
 *
 * This class validates if a given value is a IP address.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Filter
 * @category    Validation
 * @link        http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
 * @link        http://www.w3schools.com/php/filter_validate_ip.asp    W3Schools Documentation
 */
class Ip extends FilterValidator
{

    /**
     * filter
     *
     * Holds the filter id for filter_var.
     *
     * @access  protected
     * @link    http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
     * @link    http://www.w3schools.com/php/filter_validate_ip.asp    W3Schools Documentation
     * @var     integer
     */
    protected $filter = \FILTER_VALIDATE_IP;

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
        'default' => 'The input was not an valid IP address.'
    );

}