<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Validator\Filter;

use Tuersteher\Validator\FilterValidator as FilterValidator;

/**
 * Url
 *
 * This class validates if a given value is a URL.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Filter
 * @category    Validation
 * @link        http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
 * @link        http://www.w3schools.com/php/filter_validate_url.asp    W3Schools Documentation
 */
class Url extends FilterValidator
{

    /**
     * filter
     *
     * Holds the filter id for filter_var.
     *
     * @access  protected
     * @link    http://php.net/manual/en/filter.filters.validate.php    PHP Documentation
     * @link    http://www.w3schools.com/php/filter_validate_url.asp    W3Schools Documentation
     * @var     integer
     */
    protected $filter = \FILTER_VALIDATE_URL;

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
        'default' => 'The input was not an URL.'
    );

    public function getPathRequired()
    {
        if (isset($this->options['path_required']) == true) {
            return $this->options['path_required'];
        } else {
            throw new FilterException('');
        }
    }

    public function getQueryRequired()
    {
        if (isset($this->options['query_required']) == true) {
            return $this->options['query_required'];
        } else {
            throw new FilterException('');
        }
    }

    public function setPathRequired($isRequired = true)
    {

        if ($isRequired == true) {
            $this->flags['path_required'] = \FILTER_FLAG_PATH_REQUIRED;
        } elseif ($isRequired == false) {
            unset($this->flags['path_required']);
        } else {
            throw new FilterException('');
        }

    }

    public function setQueryRequired($isRequired = true)
    {

        if ($isRequired == true) {
            $this->flags['query_required'] = \FILTER_FLAG_QUERY_REQUIRED;
        } elseif ($isRequired == false) {
            unset($this->flags['query_required']);
        } else {
            throw new FilterException('');
        }

    }
}
