<?php

namespace Workflux\Tests\State\Action;

use Workflux\ExecutionContext;
use Workflux\Tests\BaseTestCase;
use Workflux\State\Action\DecrementVariableAction;

class DecrementVariableActionTest extends BaseTestCase
{
    public function testDecrementWithDefault()
    {
        $execution_ctx = new ExecutionContext('test_fsm');
        $operation = new DecrementVariableAction('foo', 2);
        $operation->apply($execution_ctx);

        $this->assertEquals(1, $execution_ctx->getParameter('foo'));
    }

    public function testDecrement()
    {
        $execution_ctx = new ExecutionContext('test_fsm', null, [ 'foo' => 4 ]);
        $operation = new DecrementVariableAction('foo');
        $operation->apply($execution_ctx);

        $this->assertEquals(3, $execution_ctx->getParameter('foo'));
    }
}
