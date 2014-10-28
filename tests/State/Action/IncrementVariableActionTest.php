<?php

namespace Workflux\Tests\State\Action;

use Workflux\ExecutionContext;
use Workflux\Tests\BaseTestCase;
use Workflux\State\Action\IncrementVariableAction;

class IncrementVariableActionTest extends BaseTestCase
{
    public function testIncrementWithDefault()
    {
        $execution_ctx = new ExecutionContext('test_fsm');
        $operation = new IncrementVariableAction('foo', 2);
        $operation->apply($execution_ctx);

        $this->assertEquals(3, $execution_ctx->getParameter('foo'));
    }

    public function testIncrement()
    {
        $execution_ctx = new ExecutionContext('test_fsm', null, [ 'foo' => 4 ]);

        $operation = new IncrementVariableAction('foo');
        $operation->apply($execution_ctx);

        $this->assertEquals(5, $execution_ctx->getParameter('foo'));
    }
}
