<?php

/**
 * This file is part of the FFUF Türsteher library.
 */

namespace Tuersteher\Validator;

/**
 * FilterValidator
 *
 * This class validates if a given value is a URL.
 *
 * @author  Nils Abegg <rueckgrat@nilsabegg.de>
 * @version 0.1
 * @package Validator
 * @subpackage Filter
 * @category Validation
 */
abstract class FilterValidator extends Validator
{

    /**
     * filter
     *
     * Holds the filter which is defined in
     * the child class.
     *
     * @access protected
     * @var int
     */
    protected $filter = null;

    /**
     * flag
     *
     * Holds the flag for the filter_var call.
     *
     * @access protected
     * @var int
     */
    protected $flag = null;

    /**
     * options
     *
     * Holds the options for the filter_var call
     * in an array.
     *
     * @access protected
     * @var mixed
     */
    protected $options = array();

    /**
     * type
     *
     * Specifies the type of the validator.
     *
     * @access protected
     * @var string
     */
    protected $type = 'filter_var';

    public function addOption($name, $option)
    {
        if (key_exists($name, $this->options) == false) {
            $this->options[$name] = $option;
        } else {
            throw new Exception('Option "' . $name . '" allready exists');
        }
    }

    public function getFlag()
    {

        if (isset($this->flag) == true) {
            return $this->flag;
        } else {
            throw new Exception('There is not flag set.');
        }

    }

    public function getOption($name)
    {

        if (key_exists($name, $this->options) == true) {
            return $this->options[$name];
        } else {
            throw new Exception('Option "' . $name . '" doesn\'t exist');
        }

    }

    public function getOptions()
    {

        if (isset($this->options[0]) == true) {
            return $this->options;
        } else {
            throw new Exception('No options set.');
        }

    }

    public function setFlag($flag)
    {

        $this->flag = $flag;

    }

    public function setOption($name, $option)
    {

        if (key_exists($name, $this->options) == true) {
            $this->options[$name] = $option;
        } else {
            throw new Exception('Option "' . $name . '" doesn\'t exist');
        }

    }

    public function setOptions($options)
    {

        $this->options = $options;

    }

    public function validate($value)
    {

        $hasFlag = isset($this->flag);
        $hasOptions = isseT($this->options[0]);
        if ($hasFlag == true && $hasOptions == true) {

        } else if ($hasFlag == true) {
            $isValid = filter_var($value, $this->filter, $this->flag);
        } else {
            $isValid = filter_var($value, $this->filter);
        }

        return $isValid;

    }

}
