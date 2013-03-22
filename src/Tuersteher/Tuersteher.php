<?php

/**
 * This file is part of the Türsteher library.
 */

namespace Tuersteher;

use \Tuersteher\Exception\InvalidArgument as InvalidArgumentException;
use Tuersteher\Validator\Schema as SchemaValidator;
use Tuersteher\Validator\Set as SetValidator;
use Tuersteher\Result\Schema as SchemaResult;
use Tuersteher\Result\Set as SetResult;
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

    protected $result = null;

    /**
     * schema
     *
     *
     *
     * @access protected
     * @var    \Tuersteher\Interfaces\Schema\Validator
     */
    protected $schema = null;

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
     * setResult
     *
     *
     *
     * @access  protected
     * @var     \Tuersteher\Interfaces\Schema\Result
     */
    protected $setResult = null;

    protected $validatorMapping = array(
        'String' => '\\Tuersteher\\Validator\\Custom\\String',
        'Url' => '\\Tuersteher\\Validator\\Filter\\Url',
    );
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

        $this->schemaResult = new SchemaResult();
        $this->setResult = new SetResult();
        $this->validatorResult = new ValidatorResult();

    }

    /**
     * __call
     *
     * 
     *
     * @access public
     * @param  string $name
     * @param  mixed  $arguments
     * @return \Tuersteher\Interfaces\Validator
     * @throws \Tuersteher\Exception\InvalidArgument
     */
    public function __call($name, $arguments)
    {

        if (substr($name, 0, 2) == 'is' && key_exists(substr($name, 2), $this->validatorMapping) == true) {
            $validator = new $this->validatorMapping[substr($name, 2)]();
        } elseif (substr($name, 0, 2) == 'is' && key_exists(substr($name, 2), $this->validatorMapping) == false) {
            throw new InvalidArgumentException('There is no validator with the name "' . substr($name, 2) . '".');
        } else {
            throw new InvalidArgumentException('Unknown function "' . $name . '" called.');
        }
        $validator->setResult(clone $this->validatorResult);

        return $validator;

    }

    /**
     * add
     *
     * Adds a validator to the curren schema. If there is
     * no schema yet, the method will create it.
     *
     * @access public
     * @param  string $key
     * @param  string $className
     * @return \Tuersteher\Validator\Validator
     */
    public function add($key, $className, $setKey = null)
    {

        if ($this->schema == null) {
            $this->schema = new SchemaValidator();
        }
        $validator = new $className();
        try {
            $currentValidator = $this->schema->getValidator($key);
            if (is_a($currentValidator, '\Tuersteher\Validator\Set') == true) {
                $currentValidator->addValidator($validator);
                $this->schema->setValidator($key, $currentValidator);
            } elseif (is_a($currentValidator, '\Tuersteher\Validator\Validator') == true) {
                $setValidator = new SetValidator();
                $setValidator->addValidator($currentValidator);
                $setValidator->addValidator($validator);
                $this->schema->setValidator($key, $setValidator);
            }
        } catch (\Tuersteher\Exception\InvalidArgument $exception) {
            $this->schema->addValidator($key, $validator);
        }

        return $validator;

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
        foreach ($parsedYamlArray as $validatorKey => $validatorSettings) {
            $validator = $this->createValidatorFromYaml($validatorSettings);
            $schema->addValidator($validatorKey, $validator);
        }

        return $schema;

    }

    /**
     * validate
     *
     *
     *
     * @access public
     * @param mixed $values
     * @return
     */
    public function validate($values)
    {

        $this->schema->validate($values);

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

        return $validator;

    }
}
