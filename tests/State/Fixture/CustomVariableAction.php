<?php

namespace Workflux\Tests\State\Fixture;

use Workflux\ExecutionContextInterface;
use Workflux\State\Action\AbstractVariableAction;

class CustomVariableAction extends AbstractVariableAction
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
