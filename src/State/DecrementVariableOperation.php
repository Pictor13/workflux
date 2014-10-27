<?php

namespace Workflux\State;

use Workflux\ExecutionContextInterface;

/**
 * Allows to decrement the value of an integer typed execution-variable.
 */
class DecrementVariableOperation extends AbstractVariableOperation
{
    /**
     * @var string TYPE_ID
     */
    const TYPE_ID = 'decrement';

    /**
     * Returns a string that uniquely identifies the operation in the context of variable-operations.
     *
     * @return string
     */
    public function getTypeId()
    {
        return self::TYPE_ID;
    }

    /**
     * Decrements the value of the corresponding execution-context variable.
     *
     * @var ExecutionContextInterface $execution_context
     */
    public function apply(ExecutionContextInterface $execution_context)
    {
        $current_value = $this->getVarAsIntOrFail($execution_context);
        $execution_context->setParameter($this->getVariableName(), --$current_value);
    }
}
