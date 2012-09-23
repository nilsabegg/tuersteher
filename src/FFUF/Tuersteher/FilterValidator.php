<?php

/**
 * This file is part of the FFUF Türsteher library.
 */

namespace FFUF\Tuersteher;

/**
 * FilterValidator
 *
 * This class validates if a given value is a URL.
 *
 * @author  Nils Abegg <rueckgrat@nilsabegg.de>
 * @version 0.1
 * @package Türsteher
 * @subpackage Validator
 * @category Validation
 */
abstract class FilterValidator extends AbstractValidator
{

    /**
     * filter
     *
     *
     *
     * @access protected
     * @var Object
     */
    protected $filter = null;

    /**
     * filterFlags
     *
     *
     *
     * @access protected
     * @var mixed
     */
    protected $filterFlags = array();

    /**
     * type
     *
     * 
     *
     * @access protected
     * @var string
     */
    protected $type = 'filter_var';

}
