<?php

namespace Workflux\State\Action;

use Workflux\ExecutionContextInterface;
use Workflux\Error\Error;
use Params\Parameters;

/**
 * Allows to append a value to either a string- or array-type execution-variable.
 */
class AppendVariableAction extends AbstractVariableAction
{
    /**
     * @var string TYPE_ID
     */
    const TYPE_ID = 'append';

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
     * Appends the operation's value to the corresponding execution-context variable.
     *
     * @var ExecutionContextInterface $execution_context
     */
    public function apply(ExecutionContextInterface $execution_context)
    {
        $execution_var = $execution_context->getParameter($this->getVariableName());
        $execution_var = ($execution_var instanceof Parameters) ? $execution_var->toArray() : $execution_var;

        if (is_string($execution_var)) {
            $execution_context->setParameter($this->getVariableName(), $execution_var . $this->getValue());
        } elseif (is_array($execution_var) || $execution_var instanceof Parameters) {
            $execution_var[] = $this->getValue();
            $execution_context->setParameter($this->getVariableName(), $execution_var);
        } else {
            throw new Error(
                sprintf(
                    'Unable to append to the given value of var: "%s".' .
                    ' Value must be the type of string or array.',
                    $this->getVariableName()
                )
            );
        }
    }
}
