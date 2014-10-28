<?php

namespace Workflux\State\Action;

use Workflux\ExecutionContextInterface;

/**
 * Allows to unset the value of an execution-variable.
 */
class UnsetVariableAction extends AbstractVariableAction
{
    /**
     * @var string TYPE_ID
     */
    const TYPE_ID = 'unset';

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
     * Unsets the corresponding execution-context variable.
     *
     * @var ExecutionContextInterface $execution_context
     */
    public function apply(ExecutionContextInterface $execution_context)
    {
        $execution_context->removeParameter($this->getVariableName());
    }
}
