<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use \Tuersteher\Exception\InvalidArgument as InvalidArgumentException;
use \Tuersteher\Validator\Validator as Validator;
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
class Schema extends Validator
{

    /**
     * validators
     *
     * Holds the validators in an array.
     *
     * @access  protected
     * @var     array
     */
    protected $validators = array();

    protected $messages = array(

    );

    /**
     * addValidator
     *
     *
     *
     * @access  public
     * @param   string $name
     * @param   \Tuersteher\ValidatorInterface $validator
     * @throws  \Tuersteher\Exception
     * @return  void
     */
    public function addValidator($name, \Tuersteher\ValidatorInterface $validator)
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
    
     /**
     * setValidator
     *
     *
     *
     * @access  public
     * @param   string $name
     * @param   \Tuersteher\Interfaces\Validator $validator
     * @throws  \Tuersteher\Exception
     * @return  void
     */
    public function setValidator($name, \Tuersteher\Interfaces\Validator $validator)
    {

        if ($name != '') {
            if (key_exists($name, $this->validators) == true) {
                $this->validators[$name] = $validator;
            } else {
                throw new Exception('Validator doesn\'t exists.');
            }
        } else {
            throw new Exception('No name for Validator given.');
        }

    }

    /**
     * validate
     *
     * Checks if the input is valid.
     *
     * @access  public
     * @param   mixed   $value
     * @return  \Tuersteher\Result\Schema
     */
    public function validate($value)
    {

        if (is_array($value) == true && count($value) > 0) {

        } else {
            throw new InvalidArgumentException('The passed value is not an array or the array is empty.');
        }

    }
}
