<?php

namespace Workflux\State;

use Workflux\Error\Error;
use Workflux\ExecutionContextInterface;

/**
 * Boilerplate implementation that can be extended when writing new VariableOperationInterface implementations.
 * Takes care of "everything"™ but the VariableOperationInterface.apply method.
 */
abstract class AbstractVariableOperation implements VariableOperationInterface
{
    /**
     * @var string $variable_name
     */
    protected $variable_name;

    /**
     * @var mixed $value
     */
    protected $value;

    /**
     * Creates a new AbstractVariableOperation instance.
     *
     * @param string $variable_name
     * @param mixed $value
     */
    public function __construct($variable_name, $value = null)
    {
        $this->variable_name = $variable_name;
        $this->value = $value;
    }

    /**
     * Returns the name of the variable, that the operation acts upon.
     *
     * @return string
     */
    public function getVariableName()
    {
        return $this->variable_name;
    }

    /**
     * Returns the value that is used to perform the operation.
     * May be null if the operation does not support a value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Tells if the operation has a value set or not.
     *
     * @return bool
     */
    public function hasValue()
    {
        return $this->value !== null;
    }

    /**
     * Returns the current execution-variables value and escalates if it's not an int.
     *
     * @param ExecutionContextInterface $execution_ctx
     *
     * @return int
     *
     * @throws Error If the value is set but not an int.
     */
    protected function getVarAsIntOrFail(ExecutionContextInterface $execution_ctx)
    {
        $execution_var = $execution_ctx->getParameter(
            $this->getVariableName(),
            $this->hasValue() ? $this->getValue() : 0
        );

        if (!is_int($execution_var)) {
            throw new Error(
                sprintf(
                    'Unable to increment the given value of var: "%s". Value must be the type of int.',
                    $this->getVariableName()
                )
            );
        }

        return $execution_var;
    }
}
