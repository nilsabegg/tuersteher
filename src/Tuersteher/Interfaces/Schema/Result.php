<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher\Interfaces\Schema;

/**
 * ValidatorInterface
 *
 * This is the interface for the results of a Türsteher validator.
 *
 * When you create results which doesn't extend any
 * of the Türsteher results you need to implement
 * this interface to make your results compatible
 * with Türsteher.
 *
 * @author      Nils Abegg <rueckgrat@nilsabegg.de>
 * @version     0.1
 * @package     Türsteher
 * @subpackage  Result
 * @category    Validation
 */
interface Result
{

    /**
     * __toString
     *
     * Returns the string which is used when the
     * result is used as a string.
     * It's a shortcut for getMessage().
     * @access  public
     * @return  string
     */
    public function __toString();

    /**
     * __invoke
     *
     * Returns if the the result is valid or not valid
     * when the result object is used as method.
     * It's a shortcut for isValid().
     * <code>
     * if ($result()) {
     *  //do blabla
     * }
     * </code>
     *
     * @access  public
     * @return  boolean
     */
    public function __invoke();

    /**
     * getMessage
     *
     * Returns the message of the result.
     *
     * @access  public
     * @return  string
     */
    public function getMessage();

    /**
     * isValid
     *
     * Returns the actual result if it is set.
     *
     * @access  public
     * @return  boolean
     */
    public function isValid();

    /**
     * setIsValid
     *
     * Set the actual result of the result object.
     *
     * @access  public
     * @param   boolean $valid
     * @return  void
     */
    public function setValid($valid);

    /**
     * setMessage
     *
     * Set the message of the result.
     *
     * @access  public
     * @param   string  $message
     * @return  void
     */
    public function setMessage($message);
}
