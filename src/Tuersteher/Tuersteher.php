<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher;

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


    public function newValidator($className)
    {
        $validator = new $className();

        return $validator;
    }

}