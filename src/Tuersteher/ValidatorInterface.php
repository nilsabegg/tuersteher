<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher;

/**
 * ValidatorInterface
 *
 * This is the interface for all validators.
 *
 * When you create validators which doesn't extend any
 * of the Türsteher validators you need to implement
 * this interface to make your validators compatible
 * with Türsteher.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @category    Validation
 */
interface ValidatorInterface
{

    /**
     * getResult
     *
     * Returns the result of the validator.
     *
     * @access  public
     */
    public function getResult();

    /**
     * isValid
     *
     * Checks if the input is valid.
     *
     * @access  public
     * @param   mixed   $value
     */
    public function isValid($value);

}