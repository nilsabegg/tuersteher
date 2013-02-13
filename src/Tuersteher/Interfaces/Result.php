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
 * @subpackage  Result
 * @category    Validation
 */
interface Result
{

    /**
     * getIsValid
     *
     *
     *
     * @access public
     * @return boolean
     */
    public function getIsValid();

    /**
     * getMessage
     *
     * Returns the result of the validator.
     *
     * @access  public
     */
    public function getMessage($name = '');

    /**
     * isValid
     *
     * Checks if the input is valid.
     *
     * @access  public
     * @return  boolean
     */
    public function isValid();


    public function setIsValid($isValid);

    /**
     * getMessage
     *
     * Returns the result of the validator.
     *
     * @access  public
     * @return  void Description
     */
    public function setMessage();

}