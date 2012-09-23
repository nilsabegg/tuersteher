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
     *
     * @var mixed
     */
    protected $validatorNamespace = array();

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

        $this->validatorNamespace['default'] = '\\Tuersteher\\Validator';

    }

    /**
     * addValidatorNamespace
     *
     *
     *
     * @param type $name
     * @param type $namespace
     */
    public function addValidatorNamespace($name, $namespace)
    {

        $this->validatorNamespace[$name] = $namespace;

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
