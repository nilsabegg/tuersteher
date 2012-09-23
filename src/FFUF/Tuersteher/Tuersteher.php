<?php

/**
 * This file is part of the FFUF Türsteher library.
 */

namespace FFUF\Tuersteher;

/**
 * Türsteher
 *
 * This class validates if a given value is a URL.
 *
 * @author  Nils Abegg <rueckgrat@nilsabegg.de>
 * @version 0.1
 * @package Türsteher
 * @category Validation
 */
class Tuersteher
{

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
     * @param mixed $value
     * @param \FFUF\Tuersteher\ValidationSchema $validationSchema
     */
    public function validate($value, $validationSchema)
    {

        $this->value = $value;
        $this->validationSchema = $validationSchema;
    }

}
