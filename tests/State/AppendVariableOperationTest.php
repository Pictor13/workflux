<?php

namespace Workflux\Tests\State;

use Workflux\ExecutionContext;
use Workflux\Tests\BaseTestCase;
use Workflux\State\AppendVariableOperation;

class AppendVariableOperationTest extends BaseTestCase
{
    public function testAppendToArray()
    {
        $operation = new AppendVariableOperation('foo', 2);
        $execution_ctx = new ExecutionContext('test_fsm', null, [ 'foo' => [ 4 ] ]);

        $operation->apply($execution_ctx);

        $this->assertEquals([ 4, 2 ], $execution_ctx->getParameter('foo')->toArray());
    }

    public function testAppendToString()
    {
        $operation = new AppendVariableOperation('foo', 'bar');
        $execution_ctx = new ExecutionContext('test_fsm', null, [ 'foo' => 'foo' ]);

        $operation->apply($execution_ctx);

        $this->assertEquals('foobar', $execution_ctx->getParameter('foo'));
    }
}
