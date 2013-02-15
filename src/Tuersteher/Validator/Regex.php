<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use Tuersteher\Validator\Validator as Validator;
use Tuersteher\Exception\Regex as RegexException;

/**
 * RegexValidator
 *
 * This class validates if a given value is a URL.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Regex
 * @category    Validation
 */
abstract class Regex extends Validator
{

    /**
     * regex
     *
     * Holds the Regular Expression.
     *
     * @access  protected
     * @var     string
     */
    protected $regex = '';

    /**
     * validate
     *
     *
     * 
     * @access  public
     * @param   mixed   $value
     * @return  boolean
     */
    public function validate($value)
    {

        $isValid = preg_match($this->regex, $value);
        if ($isValid != false) {
            $this->result = $this->createResult(true, $this->messages['default']);
        } else {
            $this->result = $this->createResult(false, $this->messages['default']);
        }

        return $this->result;

    }
}
