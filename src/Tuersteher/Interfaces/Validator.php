<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Interfaces;

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
 * @package     Türsteher
 * @subpackage  Validator
 * @category    Validation
 */
interface Validator
{
    /**
     * getResult
     *
     * Returns the result of the validator.
     *
     * @access  public
     * @return  \Tuersteher\Interfaces\Result
     */
    public function getResult();

    /**
     * isValid
     *
     * Returns the result of the validator.
     *
     * @access  public
     * @param   mixed   $value
     * @return  boolean
     */
    public function isValid($value = '');
    
    /**
     * validate
     *
     * Checks if the input is valid.
     *
     * @access  public
     * @param   mixed   $value
     * @return  \Tuersteher\Interfaces\Result
     */
    public function validate($value);

}