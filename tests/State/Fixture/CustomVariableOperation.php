<?php

namespace Workflux\Tests\State\Fixture;

use Workflux\ExecutionContextInterface;
use Workflux\State\AbstractVariableOperation;

class CustomVariableOperation extends AbstractVariableOperation
{
    public function getTypeId()
    {
        return 'set_custom';
    }

    public function apply(ExecutionContextInterface $execution_context)
    {
        $execution_context->setParameter(
            $this->getVariableName(),
            strrev($this->getValue())
        );
    }
}
