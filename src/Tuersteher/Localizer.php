<?php

use Tuersteher\Interfaces\Localizer as LocalizerInterface;

class Localizer implements LocalizerInterface
{

    protected $locale = null;
    
    public function __construct($locale)
    {

    }
}
