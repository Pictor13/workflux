<?php

namespace Workflux\State\Action;

use Workflux\ExecutionContextInterface;

/**
 * Allows to set the value of an execution-variable.
 */
class SetVariableAction extends AbstractVariableAction
{
    /**
     * @var string TYPE_ID
     */
    const TYPE_ID = 'set';

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
     * Sets the operation's value as the value of the corresponding execution-context variable.
     *
     * @var ExecutionContextInterface $execution_context
     */
    public function apply(ExecutionContextInterface $execution_context)
    {
        $execution_context->setParameter($this->getVariableName(), $this->getValue());
    }
}
