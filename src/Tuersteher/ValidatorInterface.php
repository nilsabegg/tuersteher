<?php

namespace Tuersteher;

interface ValidatorInterface
{

    public function getResult();
    
    /**
     * validate
     *
     *
     *
     * @abstract
     * @access public
     */
    public function validate($value);

}
