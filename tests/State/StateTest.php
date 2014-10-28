<?php

namespace Workflux\Tests\State;

use Workflux\Error\Error;
use Workflux\Tests\Fixture\GenericSubject;
use Workflux\State\Action\SetVariableAction;
use Workflux\State\Action\UnsetVariableAction;
use Workflux\State\Action\IncrementVariableAction;
use Workflux\State\Action\DecrementVariableAction;
use Workflux\State\Action\AppendVariableAction;
use Workflux\Tests\State\Fixture\CustomVariableAction;
use Workflux\Tests\BaseTestCase;
use Workflux\State\StateInterface;
use Workflux\State\State;

class StateTest extends BaseTestCase
{
    const FSM_NAME = 'test_machine';

    const S1 = 'state1';

    const S2 = 'state2';

    public function testConstructorAndGetters()
    {
        $state = new State(self::S1, StateInterface::TYPE_INITIAL, [], [], [ 'test_option' => 42 ]);

        $this->assertEquals(self::S1, $state->getName());
        $this->assertEquals(StateInterface::TYPE_INITIAL, $state->getType());
        $this->assertEquals(42, $state->getOption('test_option'));
        $this->assertTrue($state->isInitial());
        $this->assertFalse($state->isActive());
        $this->assertFalse($state->isFinal());
    }

    public function testInvalidType()
    {
        $this->setExpectedException(
            Error::CLASS,
            'Invalid state type "shouldnt_work" given. Only the types initial, active, final are permitted.'
        );

        new State(self::S1, 'shouldnt_work');
    }

    public function testOnEntry()
    {
        $entry_actions = [ new SetVariableAction('foo', 42) ];
        $expected = [ 'foo' => 42 ];

        $state = new State(self::S1, StateInterface::TYPE_INITIAL, $entry_actions);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $this->assertEquals([], $subject->getExecutionContext()->getParameters()->toArray());

        $state->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());

        $state->onExit($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testOnExit()
    {
        $entry_actions = [ new SetVariableAction('foo', 42) ];
        $exit_actions = [ new UnsetVariableAction('foo') ];
        $expected = [ 'foo' => 42 ];

        $state = new State(self::S1, StateInterface::TYPE_INITIAL, $entry_actions, $exit_actions);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $this->assertEquals([], $subject->getExecutionContext()->getParameters()->toArray());

        $state->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());

        $state->onExit($subject);
        $this->assertEquals([], $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testIncrementVariable()
    {
        $entry_actions = [ new IncrementVariableAction('foo', 42) ];
        $expected = [ 'foo' => 43 ];

        $state = new State(self::S1, StateInterface::TYPE_INITIAL, $entry_actions);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testDecrementVariable()
    {
        $entry_actions = [ new DecrementVariableAction('foo', 42) ];
        $expected = [ 'foo' => 41 ];

        $state = new State(self::S1, StateInterface::TYPE_INITIAL, $entry_actions);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testAppendStringVariable()
    {
        $entry_actions1 = [ new SetVariableAction('foo', 'foo') ];
        $entry_actions2 = [ new AppendVariableAction('foo', 'bar') ];
        $expected = [ 'foo' => 'foobar' ];

        $state1 = new State(self::S1, StateInterface::TYPE_INITIAL, $entry_actions1);
        $state2 = new State(self::S2, StateInterface::TYPE_FINAL, $entry_actions2);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state1->onEntry($subject);
        $state2->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testAppendArrayVariable()
    {
        $entry_actions1 = [ new SetVariableAction('foo', [ 4 ]) ];
        $entry_actions2 = [ new AppendVariableAction('foo', 2) ];
        $expected = [ 'foo' => [ 4, 2 ] ];

        $state1 = new State(self::S1, StateInterface::TYPE_INITIAL, $entry_actions1);
        $state2 = new State(self::S2, StateInterface::TYPE_FINAL, $entry_actions2);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state1->onEntry($subject);
        $state2->onEntry($subject);

        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testCustomAction()
    {
        $entry_actions = [ new CustomVariableAction('foo', 'hello world') ];

        $state = new State(self::S1, StateInterface::TYPE_INITIAL, $entry_actions);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state->onEntry($subject);

        $this->assertEquals('dlrow olleh', $subject->getExecutionContext()->getParameter('foo'));
    }
}
