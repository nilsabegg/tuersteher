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

    public function addResult($name, \Tuersteher\Interfaces\Result $result)
    {

        if (key_exists($name, $this->results) == false) {
            $this->results[$name] = $result;
        } else {
            throw new InvalidArgumentException('Result "' . $name . '" allready exists.');
        }

    }

    public function getResult($name)
    {

        if (key_exists($name, $this->results) == true) {
            return $this->results[$name];
        } else {
            throw new InvalidArgumentException('Result "' . $name . '" doesn\'t exist.');
        }

    }

    public function getResults()
    {

        if (count($this->results) > 0) {
            return $this->results;
        } else {
            throw new ResultException('No results set.');
        }

    }

    public function setResult($name, \Tuersteher\Interfaces\Result $result)
    {

        if (key_exists($name, $this->results) == true) {
            $this->results[$name] = $result;
        } else {
            throw new InvalidArgumentException('Result "' . $name . '" doesn\'t exist.');
        }

    }

    public function setResults($results)
    {

        if (is_array($results) == true) {
            $this->results = $results;
        } else {
            throw new InvalidArgumentException('The results are expected as array.');
        }

    }
}
