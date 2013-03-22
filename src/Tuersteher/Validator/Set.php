<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use \Tuersteher\Exception\InvalidArgument as InvalidArgumentException;
use \Tuersteher\Exception\Set\Validator as SetValidatorException;
use \Tuersteher\Validator\Schema as SchemaValidator;

/**
 * Set
 *
 * This class validates if a given value is a URL.
 *
 * @author  Nils Abegg <rueckgrat@nilsabegg.de>
 * @version 0.1
 * @package Türsteher
 * @category Validation
 */
class Set extends SchemaValidator
{

    /**
     * validate
     *
     * Checks if the input is valid.
     *
     * @access  public
     * @param   mixed   $values
     * @return  \Tuersteher\Result\Set
     */
    public function validate($value)
    {

        $hasError = false;
        $results = array();
        foreach ($this->validators as $key => $validator) {
            if ($value != null) {
                $result = $validator->validate($value);
                $results[$key] = $result;
                if ($result->isValid() == false) {
                    $hasError = true;
                }
            } else {
                if ($validator->isRequired() == true) {
                    $hasError = true;
                }
            }
        }
        if ($hasError == false) {
            $result = $this->createResult(true, $this->messages['default']);
        } else {
            $result = $this->createResult(false, $this->messages['default']);
        }
        $result->setResults($results);

        return $result;

    }
}
