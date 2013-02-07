<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use Tuersteher\Validator as Validator;

/**
 * FilterValidator
 *
 * This class validates if a given value is a URL.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Filter
 * @category    Validation
 * @link        http://php.net/manual/en/book.filter.php    PHP Documentation
 * @todo        Add support for messages for each option and flag.
 */
abstract class FilterValidator extends Validator
{

    /**
     * filter
     *
     * Holds the filter which is defined in
     * the child class.
     *
     * @access  protected
     * @link    http://php.net/manual/en/filter.filters.validate.php   PHP Documentation
     * @var     integer
     */
    protected $filter = null;

    /**
     * flag
     *
     * Holds the flag for the filter_var call.
     *
     * @access  protected
     * @link    http://php.net/manual/en/filter.filters.flags.php   PHP Documentation
     * @var     integer
     */
    protected $flag = null;

    /**
     * options
     *
     * Holds the options for the filter_var call
     * in an array.
     *
     * @access  protected
     * @link    http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
     * @var     array
     */
    protected $options = array();

    /**
     * type
     *
     * Specifies the type of the validator.
     *
     * @access  protected
     * @var     string
     */
    protected $type = 'filter_var';

    /**
     * addOption
     *
     * Add option to the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.validate.php   PHP Documentation
     * @param   string  $name
     * @param   mixed   $option
     * @return  void
     * @throw   \Tuersteher\Validator\Exception
     */
    public function addOption($name, $option)
    {
        if (key_exists($name, $this->options) == false) {
            $this->options[$name] = $option;
        } else {
            throw new Exception('Option "' . $name . '" allready exists');
        }
    }

    /**
     * getFlag
     *
     * Return the flag of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.flags.php   PHP Documentation
     * @return  integer
     * @throw   \Tuersteher\Validator\Exception
     */
    public function getFlag()
    {

        if (isset($this->flag) == true) {
            return $this->flag;
        } else {
            throw new Exception('There is not flag set.');
        }

    }

    /**
     * getOption
     *
     * Returns an option of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.validate.php   PHP Documentation
     * @param   string  $name
     * @return  mixed
     * @throw   \Tuersteher\Validator\Exception
     */
    public function getOption($name)
    {

        if (key_exists($name, $this->options) == true) {
            return $this->options[$name];
        } else {
            throw new Exception('Option "' . $name . '" doesn\'t exist');
        }

    }

    /**
     * getOptions
     *
     * Returns the options of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.validate.php   PHP Documentation
     * @return  array
     * @throw   \Tuersteher\Validator\Exception
     */
    public function getOptions()
    {

        if (count($this->options) > 0) {
            return $this->options;
        } else {
            throw new Exception('No options set.');
        }

    }

    /**
     * isValid
     *
     * Checks if the input is valid.
     *
     * @access  public
     * @param   mixed   $value
     * @return  boolean
     */
    public function isValid($value)
    {

        $hasFlag = isset($this->flag);
        $optionsCount = count($this->options);
        if ($hasFlag == true && $optionsCount > 0) {
            $isValid = filter_var($value, $this->filter, array('options' => $this->options, 'flags' => $this->flag));
        } else if ($hasFlag == true) {
            $isValid = filter_var($value, $this->filter, $this->flag);
        } else if ($optionsCount > 0) {
            $isValid = filter_var($value, $this->filter, array('options' => $this->options));
        } else {
            $isValid = filter_var($value, $this->filter);
        }
        if ($isValid != false) {
            //$returnValue = $isValid;
            $isValid = true;
        }

        return $isValid;
    }

    /**
     * setFlag
     *
     * Sets the Flag of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.flags.php   PHP Documentation
     * @param   integer $flag
     * @return  void
     * @throw   \Tuersteher\Validator\Exception
     */
    public function setFlag($flag)
    {

        if (is_integer($flag) == true) {
            $this->flag = $flag;
        } else {
            throw new Exception('The flag is not an integer.');
        }

    }

    /**
     * setOption
     *
     * Sets an option of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.validate.php   PHP Documentation
     * @param   string  $name
     * @param   mixed   $option
     * @return  void
     * @throw   \Tuersteher\Validator\Exception
     */
    public function setOption($name, $option)
    {

        if (key_exists($name, $this->options) == true) {
            $this->options[$name] = $option;
        } else {
            throw new Exception('Option "' . $name . '" doesn\'t exist');
        }

    }

    /**
     * setOptions
     *
     * Sets the options of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.validate.php   PHP Documentation
     * @param   array   $options
     * @return  void
     * @throw   \Tuersteher\Validator\Exception
     */
    public function setOptions($options)
    {

        if (is_array($options) == true) {
            $this->options = $options;
        } else {
            throw new Exception();
        }

    }

}
