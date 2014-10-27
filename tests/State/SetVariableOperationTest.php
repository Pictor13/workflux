<?php

namespace Workflux\Tests\State;

use Workflux\ExecutionContext;
use Workflux\Tests\BaseTestCase;
use Workflux\State\SetVariableOperation;

class SetVariableOperationTest extends BaseTestCase
{
    public function testAppendToArray()
    {
        $execution_ctx = new ExecutionContext('test_fsm');
        $operation = new SetVariableOperation('foo', 'bar');

        $operation->apply($execution_ctx);

        $this->assertEquals('bar', $execution_ctx->getParameter('foo'));
    }
}
