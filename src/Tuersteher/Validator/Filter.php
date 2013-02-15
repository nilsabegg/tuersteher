<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator;

use \Tuersteher\Validator\Validator as Validator;
use \Tuersteher\Exception\Filter as FilterException;
use \Tuersteher\Exception\InvalidArgument as InvalidArgumentException;

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
 */
abstract class Filter extends Validator
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
     * @throw   \Tuersteher\Exception\InvalidArgument
     */
    public function addOption($name, $option)
    {
        if (key_exists($name, $this->options) == false) {
            $this->options[$name] = $option;
        } else {
            throw new InvalidArgumentException('Option "' . $name . '" allready exists');
        }
    }

    /**
     * addFlag
     *
     * Add flag to the validator.
     *
     * @access  public
     * @link    http://php.net/manual/en/filter.filters.validate.php   PHP Documentation
     * @param   string  $name
     * @param   mixed   $flag
     * @return  void
     * @throw   \Tuersteher\Exception\InvalidArgument
     */
    public function addFlag($name, $flag)
    {
        if (key_exists($name, $this->flags) == false) {
            $this->flags[$name] = $flag;
        } else {
            throw new InvalidArgumentException('Flag "' . $name . '" allready exists');
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
     * @throw   \Tuersteher\Exception\InvalidArgument
     */
    public function getFlag($name)
    {

        if (isset($this->flags[$name]) == true) {
            return $this->flags[$name];
        } else {
            throw new InvalidArgumentException('Flag "' . $name . '" is not set.');
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
     * @throw   \Tuersteher\Exception\InvalidArgument
     */
    public function getOption($name)
    {

        if (key_exists($name, $this->options) == true) {
            return $this->options[$name];
        } else {
            throw new InvalidArgumentException('Option "' . $name . '" doesn\'t exist');
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

        $flagsCount = count($this->flags);
        $optionsCount = count($this->options);
        if ($flagsCount > 0 && $optionsCount > 0) {
            $isValid = filter_var($value, $this->filter, array('options' => $this->options, 'flags' => array_sum($this->flags)));
        } elseif ($flagsCount > 0) {
            $isValid = filter_var($value, $this->filter, array_sum($this->flags));
        } elseif ($optionsCount > 0) {
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
     * @throw   \Tuersteher\Exception\InvalidArgument
     */
    public function setFlag($name, $flag)
    {

        if (is_integer($flag) == true && isset($this->flags[$name]) == true) {
            $this->flags[$name] = $flag;
        } else {
            if (is_integer($flag) == false) {
                throw new InvalidArgumentException('The flag "' . $flag . '" is not an integer.');
            } else {
                throw new InvalidArgumentException('The flag "' . $name . '" doesn\'t exist.');
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
            throw new InvalidArgumentException('The flags are expected as array');
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
     * @throw   \Tuersteher\Exception\InvalidArgument
     */
    public function setOption($name, $option)
    {

        if (key_exists($name, $this->options) == true) {
            $this->options[$name] = $option;
        } else {
            throw new InvalidArgumentException('Option "' . $name . '" doesn\'t exist');
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
     * @throw   \Tuersteher\Exception\InvalidArgument
     */
    public function setOptions($options)
    {

        if (is_array($options) == true) {
            $this->options = $options;
        } else {
            throw new InvalidArgumentException('The options are expected as array');
        }

    }
}
