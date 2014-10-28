<?php

namespace Workflux\Tests\Builder\Fixture;

use Workflux\ExecutionContextInterface;
use Workflux\State\Action\AbstractVariableAction;

class CustomAction extends AbstractVariableAction
{
    public function getTypeId()
    {
        return 'custom';
    }

    public function apply(ExecutionContextInterface $execution_context)
    {
        $execution_context->setParameter(
            $this->getVariableName(),
            $this->getOption('fnord')
        );
    }
}
