<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Exception;

use \Tuersteher\Interfaces\Exception as ExceptionInterface;

/**
 * Exception
 *
 * This is the parent class for all exceptions of the Türsteher library.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Türsteher
 * @subpackage  Exception
 * @category    Exception Handling
 */
abstract class Exception extends \Exception implements ExceptionInterface
{
}
