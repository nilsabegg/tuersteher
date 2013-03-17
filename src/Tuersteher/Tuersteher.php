<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher;

use Tuersteher\Result\Validator as ValidatorResult;

/**
 * Türsteher
 *
 * This class is the main class of the Türsteher library.
 *
 * @author  Nils Abegg <rueckgrat@nilsabegg.de>
 * @version 0.1
 * @package Türsteher
 * @category Validation
 */
class Tuersteher
{

    /**
     * schemaResult
     *
     *
     *
     * @access  protected
     * @var     \Tuersteher\Interfaces\Schema\Result
     */
    protected $schemaResult = null;

    /**
     * validatorResult
     *
     *
     *
     * @access  protected
     * @var     \Tuersteher\Interfaces\Result
     */
    protected $validatorResult = null;

    /**
     * __construct
     *
     * Constructs the object.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {

        $this->validatorResult = new ValidatorResult();

    }

    /**
     * __construct
     *
     * Constructs the object.
     *
     * @access public
     * @param  \Tuersteher\Interfaces\Schema\Result $result
     * @return void
     */
    public function setSchemaResult(\Tuersteher\Interfaces\Schema\Result $result)
    {

        $this->schemaResult = $result;

    }

    /**
     * __construct
     *
     * Constructs the object.
     *
     * @access public
     * @param  \Tuersteher\Interfaces\Result    $result
     * @return void
     */
    public function setValidatorResult(\Tuersteher\Interfaces\Result $result)
    {

        $this->validatorResult = $result;

    }

    /**
     * __construct
     *
     * Constructs the object.
     *
     * @access public
     * @param  string   $className
     * @return \Tuersteher\Interfaces\Validator
     */
    public function create($className)
    {

        $validator = new $className();
        $validator->setResult(clone $this->validatorResult);

        return $validator;

    }

    /**
     * createSchemaFromYaml
     *
     * Creates a validation schema from a parsed YAML file.
     *
     * @access  public
     * @param   mixed $parsedYamlArray
     * @return  \Tuersteher\Interfaces\Schema\Validator
     */
    public function createSchemaFromYaml($parsedYamlArray)
    {

        $schema = new \Tuersteher\Validator\Schema();
        $schema->setResult(clone $this->schemaResult);
        foreach ($parsedYamlArray as $validatorKey => $validators) {
            foreach ($validators as $validatorName => $validatorSettings) {
                $validator = $this->createValidatorFromYaml($validatorSettings);
                $schema->addValidator($validatorKey, $validatorName, $validator);
            }
        }

    }

    /**
     * createValidatorFromYaml
     *
     * Creates a validator from a parsed YAML file.
     *
     * @access  public
     * @param   mixed $validatorSettings
     * @return  \Tuersteher\Interfaces\Validator
     */
    protected function createValidatorFromYaml($validatorSettings)
    {
        $validator = new $validatorSettings['class']();
        $validator->setResult(clone $this->validatorResult);
        foreach ($validatorSettings as $settingName => $setting) {
            if ($settingName == 'messages') {
                $validator->setMessages($setting);
            } elseif ($settingName == 'options') {
                foreach ($setting as $optionName => $option) {
                    $methodName = 'set' . ucfirst($optionName);
                    $validator->$methodName($option);
                }
            }
        }
    }
}
