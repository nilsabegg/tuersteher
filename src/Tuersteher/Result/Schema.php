<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Result;

use \Tuersteher\Exception\InvalidArgument as InvalidArgumentException;
use \Tuersteher\Exception\Result as ResultException;
use \Tuersteher\Interfaces\Schema\Result as SchemaResultInterface;
use \Tuersteher\Result\Validator as ValidatorResult;

/**
 * Schema
 *
 * This class validates if a given value is a URL.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Türsteher
 * @category    Validation
 */
class Schema extends ValidatorResult implements SchemaResultInterface
{

    /**
     * results
     *
     * Holds the result objects of the schema in an array.
     *
     * @access protected
     * @var    mixed
     */
    protected $results = array(

    );

    /**
     * __construct
     *
     * Constructs the object.
     *
     * @access public
     * @param  boolean  $isValid
     * @param  string   $message
     * @param  mixed    $results    An array where each value is an instance of \Tuersteher\Interfaces\Result.
     * @return void
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function __construct($isValid = null, $message = '', $results = null)
    {

        if ($isValid !== null) {
            $this->setValid($isValid);
        }
        $this->setMessage($message);
        if ($results != null) {
            $this->setResults($results);
        }

    }

    /**
     * addResult
     *
     * Adds the result for a validator key.
     *
     * @access  public
     * @param   string $key
     * @param   \Tuersteher\Interfaces\Result $result
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function addResult($key, \Tuersteher\Interfaces\Result $result)
    {

        if (key_exists($key, $this->results) == false) {
            $this->results[$key] = $result;
        } else {
            throw new InvalidArgumentException('Result "' . $key . '" allready exists.');
        }

    }

    /**
     * getResult
     *
     * Returns the result for a validator key.
     *
     * @access  public
     * @param   string $key
     * @return  \Tuersteher\Interfaces\Result
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function getResult($key)
    {

        if (key_exists($key, $this->results) == true) {
            return $this->results[$key];
        } else {
            throw new InvalidArgumentException('Result "' . $key . '" doesn\'t exist.');
        }

    }

    /**
     * getResults
     *
     * Returns the results for each validator.
     *
     * @access  public
     * @return  mixed   An array where each value is an instance of \Tuersteher\Interfaces\Result.
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function getResults()
    {

        if (count($this->results) > 0) {
            return $this->results;
        } else {
            throw new ResultException('No results set.');
        }

    }

    /**
     * setResult
     *
     * Sets the result for a validator key.
     *
     * @access  public
     * @param   string $key
     * @param   \Tuersteher\Interfaces\Result $result
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function setResult($key, \Tuersteher\Interfaces\Result $result)
    {

        if (key_exists($key, $this->results) == true) {
            $this->results[$key] = $result;
        } else {
            throw new InvalidArgumentException('Result "' . $key . '" doesn\'t exist.');
        }

    }

    /**
     * setResults
     *
     * Sets the results of each validator for the
     * result of the schema.
     *
     * @access  public
     * @param   mixed $results An array where each value is an instance of \Tuersteher\Interfaces\Result.
     * @return  void
     * @throws  \Tuersteher\Exception\InvalidArgument
     */
    public function setResults($results)
    {

        if (is_array($results) == true) {
            $this->results = $results;
        } else {
            throw new InvalidArgumentException('The results are expected as array.');
        }

    }
}
