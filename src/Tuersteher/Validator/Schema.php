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
        'default' => 'One or more values are invalid.'
    );

    /**
     * add
     *
     * This is a shortcut for addValidator.
     *
     * @access  public
     * @param   string $key
     * @param   \Tuersteher\Interfaces\Validator $validator
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function add($key, \Tuersteher\Interfaces\Validator $validator)
    {

        $this->addValidator($key, $validator);

    }
    
    /**
     * addValidator
     *
     * Adds a Validator to the Schema. You can add
     * several validators to one key.
     *
     * @access  public
     * @param   string $key
     * @param   \Tuersteher\Interfaces\Validator $validator
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function addValidator($key, \Tuersteher\Interfaces\Validator $validator)
    {

        if ($key != '') {
            if (key_exists($key, $this->validators) == false) {
                $this->validators[$key] = $validator;
            } else {
                throw new InvalidArgumentException('Validator allready added.');
            }
        } else {
            throw new InvalidArgumentException('No key for Validator given.');
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
     * @return  \Tuersteher\Interfaces\Validator
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function getValidator($key)
    {

        if (key_exists($key, $this->validators) == true) {
            return $this->validators[$key];
        } else {
            throw new InvalidArgumentException('Validator "' . $key . '" doesn\'t exist.');
        }

    }

    /**
     * getValidators
     *
     * Returns the all validators if no key is passed,
     * or all the validators for one key.
     *
     * @access public
     * @return mixed
     * @throws \Tuersteher\Exception\Schema\Validator
     */
    public function getValidators()
    {

        if (count($this->validators) > 0) {
            return $this->validators;
        } else {
            throw new SchemaValidatorException('No Validators set.');
        }

    }

     /**
     * setValidator
     *
     *
     *
     * @access  public
     * @param   string $key
     * @param   \Tuersteher\Interfaces\Validator $validator
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function setValidator($key, \Tuersteher\Interfaces\Validator $validator)
    {

        if ($key != '') {
            if (isset($this->validators[$key]) == true) {
                $this->validators[$key] = $validator;
            } else {
                throw new InvalidArgumentException('Validator doesn\'t exist.');
            }
        } else {
            throw new InvalidArgumentException('No key for Validator given.');
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
            $results = array();
            foreach ($this->validators as $key => $validator) {
                if (key_exists($key, $values) == true) {
                    $result = $validator->validate($values[$key]);
                    $results[$key] = $result;
                    if ($result() == false) {
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
        } else {
            throw new InvalidArgumentException('The passed value is not an array or the array is empty.');
        }

    }
}
