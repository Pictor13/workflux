<?php

namespace Workflux\Tests\State\Action;

use Workflux\ExecutionContext;
use Workflux\Tests\BaseTestCase;
use Workflux\State\Action\UnsetVariableAction;

class UnsetVariableActionTest extends BaseTestCase
{
    public function testAppendToArray()
    {
        $execution_ctx = new ExecutionContext('test_fsm', null, [ 'foo' => 'bar' ]);
        $operation = new UnsetVariableAction('foo');

        $operation->apply($execution_ctx);

        $this->assertFalse($execution_ctx->hasParameter('foo'));
    }
}
