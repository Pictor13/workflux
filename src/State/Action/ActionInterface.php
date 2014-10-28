<?php

namespace Workflux\State\Action;

use Workflux\ExecutionContextInterface;

/**
 * ActionInterface implementations may run specific logic for transitions (onEntry and onExit).
 */
interface ActionInterface
{
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
