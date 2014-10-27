<?php

namespace Workflux\Tests\State;

use Workflux\ExecutionContext;
use Workflux\Tests\BaseTestCase;
use Workflux\State\IncrementVariableOperation;

class IncrementVariableOperationTest extends BaseTestCase
{
    public function testIncrementWithDefault()
    {
        $execution_ctx = new ExecutionContext('test_fsm');
        $operation = new IncrementVariableOperation('foo', 2);
        $operation->apply($execution_ctx);

        $this->assertEquals(3, $execution_ctx->getParameter('foo'));
    }

    public function testIncrement()
    {
        $execution_ctx = new ExecutionContext('test_fsm', null, [ 'foo' => 4 ]);

        $operation = new IncrementVariableOperation('foo');
        $operation->apply($execution_ctx);

        $this->assertEquals(5, $execution_ctx->getParameter('foo'));
    }
}
