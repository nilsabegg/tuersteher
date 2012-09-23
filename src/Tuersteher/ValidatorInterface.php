<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher;

/**
 * ValidatorInterface
 *
 * This class validates if a given value is a URL.
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
     *
     *
     * @access  public
     */
    public function getResult();

    /**
     * validate
     *
     *
     *
     * @access  public
     */
    public function validate($value);

}
