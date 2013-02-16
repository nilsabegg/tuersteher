<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Test;

use Tuersteher\Validator\Regex as RegexValidator;

/**
 * Url
 *
 * This class validates if a given value is a URL.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Validator
 * @subpackage  Regex
 * @category    Validation
 */
class Validator extends RegexValidator
{

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
     * regex
     *
     * Holds the Regular Expression.
     *
     * @access  protected
     * @link    http://stackoverflow.com/a/2015516 Stackoverflow discussion
     * @var     string
     */
    protected $regex = '/^(https?):\/\/(([a-z0-9$_\.\+!\*\'\(\),;\?&=-]|%[0-9a-f]{2})+(:([a-z0-9$_\.\+!\*\'\(\),;\?&=-]|%[0-9a-f]{2})+)?@)?(?#)((([a-z0-9]\.|[a-z0-9][a-z0-9-]*[a-z0-9]\.)*[a-z][a-z0-9-]*[a-z0-9]|((\d|[1-9]\d|1\d{2}|2[0-4][0-9]|25[0-5])\.){3}(\d|[1-9]\d|1\d{2}|2[0-4][0-9]|25[0-5]))(:\d+)?)(((\/+([a-z0-9$_\.\+!\*\'\(\),;:@&=-]|%[0-9a-f]{2})*)*(\?([a-z0-9$_\.\+!\*\'\(\),;:@&=-]|%[0-9a-f]{2})*)?)?)?(#([a-z0-9$_\.\+!\*\'\(\),;:@&=-]|%[0-9a-f]{2})*)?$/i';

    public function validate($value)
    {

        $isValid = preg_match($this->regex, $value);
        if ($isValid != false) {
            $this->result = $this->createResult(true, $this->messages);
        } else {
            $this->result = $this->createResult(false, $this->messages);
        }

        return $this->result;

    }
}
