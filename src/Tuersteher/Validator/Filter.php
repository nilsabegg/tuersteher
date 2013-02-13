<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use Tuersteher\Validator as Validator;
use Tuersteher\Exception\Filter as FilterException;

/**
 * FilterValidator
 *
 * This class is the parent class of all filter validators.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Filter
 * @category    Validation
 * @link        http://php.net/manual/en/book.filter.php    PHP Documentation
 * @todo        Add support for multiple flags.
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
     * flags
     *
     * Holds the flags for the filter_var call.
     *
     * @access  protected
     * @link    http://php.net/manual/en/filter.filters.flags.php   PHP Documentation
     * @var     array
     */
    protected $flags = array();

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
     * @throw   \Tuersteher\Exception\Filter
     */
    public function addOption($name, $option)
    {
        if (key_exists($name, $this->options) == false) {
            $this->options[$name] = $option;
        } else {
            throw new FilterException('Option "' . $name . '" allready exists');
        }
    }

    /**
     * getFlag
     *
     * Return the flag of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.flags.php   PHP Documentation
     * @param   string $name
     * @return  integer
     * @throw   \Tuersteher\Exception\Filter
     */
    public function getFlag($name)
    {

        if (isset($this->flags[$name]) == true) {
            return $this->flags[$name];
        } else {
            throw new FilterException('Flag "' . $name . '" is not set.');
        }

    }

    /**
     * getFlags
     *
     * Returns the flags of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.validate.php   PHP Documentation
     * @return  array
     * @throw   \Tuersteher\Exception\Filter
     */
    public function getFlags()
    {

        if (count($this->options) > 0) {
            return $this->options;
        } else {
            throw new FilterException('No options set.');
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
     * @throw   \Tuersteher\Exception\Filter
     */
    public function getOption($name)
    {

        if (key_exists($name, $this->options) == true) {
            return $this->options[$name];
        } else {
            throw new FilterException('Option "' . $name . '" doesn\'t exist');
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
     * @throw   \Tuersteher\Exception\Filter
     */
    public function getOptions()
    {

        if (count($this->options) > 0) {
            return $this->options;
        } else {
            throw new FilterException('No options set.');
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
    public function validate($value)
    {

        $hasFlag = isset($this->flag);
        $optionsCount = count($this->options);
        if ($hasFlag == true && $optionsCount > 0) {
            $isValid = filter_var($value, $this->filter, array('options' => $this->options, 'flags' => $this->flags[0]));
        } else if ($hasFlag == true) {
            $isValid = filter_var($value, $this->filter, $this->flags[0]);
        } else if ($optionsCount > 0) {
            $isValid = filter_var($value, $this->filter, array('options' => $this->options));
        } else {
            $isValid = filter_var($value, $this->filter);
        }
        if ($isValid != false) {
            $this->result = $this->createResult(true, $this->messages['default']);
        } else {
            $this->result = $this->createResult(false, $this->messages['default']);
        }
        return $this->result;

    }

    /**
     * setFlag
     *
     * Sets the Flag of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.flags.php   PHP Documentation
     * @param   string  $name
     * @param   integer $flag
     * @return  void
     * @throw   \Tuersteher\Exception\Filter
     */
    public function setFlag($name, $flag)
    {

        if (is_integer($flag) == true && isset($this->flags[$name]) == true) {
            $this->flags[$name] = $flag;
        } else {
            if (is_integer($flag) == false) {
                throw new FilterException('The flag "' . $flag . '" is not an integer.');
            } else {
                throw new FilterException('The flag "' . $name . '" doesn\'t exist.');
            }

        }

    }

    /**
     * setFlags
     *
     * Sets the options of the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.flags.php   PHP Documentation
     * @param   array   $flags
     * @return  void
     * @throw   \Tuersteher\Exception\Filter
     */
    public function setFlags($flags)
    {

        if (is_array($flags) == true) {
            $this->flags = $flags;
        } else {
            throw new FilterException();
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
     * @throw   \Tuersteher\Exception\Filter
     */
    public function setOption($name, $option)
    {

        if (key_exists($name, $this->options) == true) {
            $this->options[$name] = $option;
        } else {
            throw new FilterException('Option "' . $name . '" doesn\'t exist');
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
     * @throw   \Tuersteher\Exception\Filter
     */
    public function setOptions($options)
    {

        if (is_array($options) == true) {
            $this->options = $options;
        } else {
            throw new FilterException();
        }

    }

}
