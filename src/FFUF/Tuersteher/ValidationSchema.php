<?php

/**
 * This file is part of the FFUF Türsteher library.
 */

namespace FFUF\Tuersteher;

/**
 * ValidationSchema
 *
 * This class validates if a given value is a URL.
 *
 * @author  Nils Abegg <rueckgrat@nilsabegg.de>
 * @version 0.1
 * @package Türsteher
 * @category Validation
 */
class ValidationSchema
{

    /**
     * validators
     *
     * Holds the validators in an array.
     *
     * @access protected
     * @var mixed
     */
    protected $validators = array();

    /**
     * addValidator
     *
     *
     * 
     * @access public
     * @param string $name
     * @param \Tuersteher\AbstractValidator $validator
     * @throws \Tuersteher\Exception
     * @return void
     */
    public function addValidator($name, \Tuersteher\AbstractValidator $validator)
    {

        if ($name != '') {
            if (key_exists($name, $this->validators) == false) {
                $this->validators[$name] = $validator;
            } else {
                throw new Exception('Validator allready added.');
            }
        } else {
            throw new Exception('No name for Validator given.');
        }

    }

}
