<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator\Filter;

use Tuersteher\FilterValidator as FilterValidator;

/**
 * Url
 *
 * This class validates if a given value is a URL.
 *
 * @author  Nils Abegg <rueckgrat@nilsabegg.de>
 * @version 0.1
 * @package Validator
 * @subpackage Filter
 * @category Validation
 */
class Url extends FilterValidator
{

    /**
     * messages
     *
     * Holds the messages for for invalid input in
     * an array.
     *
     * @access protected
     * @var mixed
     */
    protected $messages = array(
        'default' => 'The input was not an URL.'
    );

    /**
     * __construct
     *
     * Constructs the object.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {



    }

    /**
     * validate
     *
     *
     *
     * @access public
     * @param mixed $value
     * @return bool
     */
    public function validate($value)
    {

        $isValid = filter_var($value, $this->filter);

        return $isValid;

    }

}
