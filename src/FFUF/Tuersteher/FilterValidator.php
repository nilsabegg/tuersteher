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

    protected $filter = null;

    protected $filterFlags = array();

    /**
     *
     * @var string
     */
    protected $type = 'filter_var';

}
