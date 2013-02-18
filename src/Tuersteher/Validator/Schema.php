<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use \Tuersteher\Exception\InvalidArgument as InvalidArgumentException;
use \Tuersteher\Exception\Schema\Validator as SchemaValidatorException;
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

    /**
     * messages
     *
     * Holds the messages for for invalid input in
     * an array.
     *
     * @access  protected
     * @var     array
     */
    protected $messages = array(

    );

    /**
     * addValidator
     *
     * Adds a Validator to the Schema. You can add
     * several validators to one key.
     *
     * @access  public
     * @param   string $key
     * @param   string $validatorName
     * @param   \Tuersteher\Interfaces\Validator $validator
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function addValidator($key, $validatorName, \Tuersteher\Interfaces\Validator $validator)
    {

        if ($key != '' && $validatorName != '') {
            if (key_exists($key, $this->validators) == false) {
                $this->validators[$key][$validatorName] = $validator;
            } elseif (key_exists($validatorName, $this->validators[$key]) == false) {
                $this->validators[$key][$validatorName] = $validator;
            } else {
                throw new InvalidArgumentException('Validator allready added.');
            }
        } else {
            throw new InvalidArgumentException('No key or name for Validator given.');
        }

    }

    /**
     * getValidator
     *
     * Adds a Validator to the Schema. You can add
     * several validators to one key.
     *
     * @access  public
     * @param   string $key
     * @param   string $name
     * @return  \Tuersteher\Interfaces\Validator
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function getValidator($key, $name = null)
    {

        if ($name == null && key_exists($key, $this->validators) == true) {
            return $this->validators[$key][0];
        } elseif (key_exists($name, $this->validators[$key]) == true) {
            return $this->validators[$key][$name];
        } else {
            throw new InvalidArgumentException('Validator "' . $name . '" for key "' . $key . '" doesn\'t exist.');
        }

    }

    /**
     * getValidators
     *
     * Returns the all validators if no key is passed,
     * or all the validators for one key.
     *
     * @access public
     * @param  string $key
     * @return mixed
     * @throws \Tuersteher\Exception\InvalidArgument
     * @throws \Tuersteher\Exception\Schema\Validator
     */
    public function getValidators($key = null)
    {

        if ($key === null) {
            if (count($this->validators) > 0) {
                return $this->validators;
            } else {
                throw new SchemaValidatorException('No Validators set.');
            }
        } elseif (key_exists($key, $this->validators) == true) {
                return $this->validators[$key];
        } else {
            throw new InvalidArgumentException('There is no validator for key "' . $key . '".');
        }

    }

     /**
     * setValidator
     *
     *
     *
     * @access  public
     * @param   string $key
     * @param   string $name
     * @param   \Tuersteher\Interfaces\Validator $validator
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function setValidator($key, $name, \Tuersteher\Interfaces\Validator $validator)
    {

        if ($key != '' && $name != '') {
            if (key_exists($name, $this->validators[$key]) == true) {
                $this->validators[$key][$name] = $validator;
            } else {
                throw new InvalidArgumentException('Validator doesn\'t exist.');
            }
        } else {
            throw new InvalidArgumentException('No key or name for Validator given.');
        }

    }

    /**
     * setValidators
     *
     *
     *
     * @access  public
     * @param   mixed $validators
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function setValidators($validators)
    {

        if (is_array($validators) == true) {
            $this->validators = $validators;
        } else {
            throw new InvalidArgumentException('The validators are expected as array.');
        }

    }

    /**
     * validate
     *
     * Checks if the input is valid.
     *
     * @access  public
     * @param   mixed   $values
     * @return  \Tuersteher\Result\Schema
     */
    public function validate($values)
    {

        $hasError = false;
        if (is_array($values) == true && count($values) > 0) {
            foreach ($values as $key => $value) {
                $results = array();
                if ($value != null) {
                    foreach ($this->validators[$key] as $validatorName => $validator) {
                        $results[] = $validator->validate($value);
                    }
                    foreach ($results as $result) {

                    }
                } else {

                }
            }
        } else {
            throw new InvalidArgumentException('The passed value is not an array or the array is empty.');
        }

    }
}
