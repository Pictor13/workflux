<?php

namespace Workflux\Tests\State\Action;

use Workflux\ExecutionContext;
use Workflux\Tests\BaseTestCase;
use Workflux\State\Action\SetVariableAction;

class SetVariableActionTest extends BaseTestCase
{
    public function testAppendToArray()
    {
        $execution_ctx = new ExecutionContext('test_fsm');
        $operation = new SetVariableAction('foo', 'bar');

        $operation->apply($execution_ctx);

        $this->assertEquals('bar', $execution_ctx->getParameter('foo'));
    }
}
