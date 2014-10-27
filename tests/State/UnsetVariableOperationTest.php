<?php

namespace Workflux\Tests\State;

use Workflux\ExecutionContext;
use Workflux\Tests\BaseTestCase;
use Workflux\State\UnsetVariableOperation;

class UnsetVariableOperationTest extends BaseTestCase
{
    public function testAppendToArray()
    {
        $execution_ctx = new ExecutionContext('test_fsm', null, [ 'foo' => 'bar' ]);
        $operation = new UnsetVariableOperation('foo');

        $operation->apply($execution_ctx);

        $this->assertFalse($execution_ctx->hasParameter('foo'));
    }
}
