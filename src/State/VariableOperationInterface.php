<?php

namespace Workflux\State;

use Workflux\ExecutionContextInterface;

/**
 * VariableOperationInterface implementations are expected to implement specific behaviour
 * for acting upon execution-context variables.
 */
interface VariableOperationInterface
{
    /**
     * Returns the name of the variable, that the operation acts upon.
     *
     * @return string
     */
    public function getVariableName();

    /**
     * Returns the value that is used to perform the operation.
     * May be null if the operation does not support a value.
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Tells if the operation has a value set or not.
     *
     * @return bool
     */
    public function hasValue();

    /**
     * Returns a string that uniquely identifies the operation in the context of variable-operations.
     *
     * @return string
     */
    public function getTypeId();

    /**
     * Applies a specific operation to an execution-context variable.
     *
     * @var ExecutionContextInterface $execution_context
     */
    public function apply(ExecutionContextInterface $execution_context);
}
