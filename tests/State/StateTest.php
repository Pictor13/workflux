<?php

namespace Workflux\Tests\State;

use Workflux\Error\Error;
use Workflux\Tests\Fixture\GenericSubject;
use Workflux\Tests\State\Fixture\CustomVariableOperation;
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
        $state = new State(self::S1, StateInterface::TYPE_INITIAL, [ 'test_option' => 42 ]);

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
        $entry_vars = [ 'foo' => [ 'type' => 'set', 'value' => 42 ] ];
        $expected = [ 'foo' => 42 ];

        $state = new State(self::S1, StateInterface::TYPE_INITIAL, [ State::OPTION_ENTRY_VARS => $entry_vars ]);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $this->assertEquals([], $subject->getExecutionContext()->getParameters()->toArray());

        $state->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());

        $state->onExit($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testOnExit()
    {
        $entry_vars = [ 'foo' => [ 'type' => 'set', 'value' => 42 ] ];
        $exit_vars = [ 'foo' => [ 'type' => 'unset' ] ];
        $expected = [ 'foo' => 42 ];

        $state_options = [ State::OPTION_ENTRY_VARS => $entry_vars, State::OPTION_EXIT_VARS => $exit_vars ];
        $state = new State(self::S1, StateInterface::TYPE_INITIAL, $state_options);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $this->assertEquals([], $subject->getExecutionContext()->getParameters()->toArray());

        $state->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());

        $state->onExit($subject);
        $this->assertEquals([], $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testIncrementVariable()
    {
        $entry_vars = [ 'foo' => [ 'type' => 'increment', 'value' => 42 ] ];
        $expected = [ 'foo' => 43 ];

        $state = new State(self::S1, StateInterface::TYPE_INITIAL, [ State::OPTION_ENTRY_VARS => $entry_vars ]);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testDecrementVariable()
    {
        $entry_vars = [ 'foo' => [ 'type' => 'decrement', 'value' => 42 ] ];
        $expected = [ 'foo' => 41 ];

        $state = new State(self::S1, StateInterface::TYPE_INITIAL, [ State::OPTION_ENTRY_VARS => $entry_vars ]);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testAppendStringVariable()
    {
        $entry_vars1 = [ 'foo' => [ 'type' => 'set', 'value' => 'foo' ] ];
        $entry_vars2 = [ 'foo' => [ 'type' => 'append', 'value' => 'bar' ] ];
        $expected = [ 'foo' => 'foobar' ];

        $state1 = new State(self::S1, StateInterface::TYPE_INITIAL, [ State::OPTION_ENTRY_VARS => $entry_vars1 ]);
        $state2 = new State(self::S2, StateInterface::TYPE_FINAL, [ State::OPTION_ENTRY_VARS => $entry_vars2 ]);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state1->onEntry($subject);
        $state2->onEntry($subject);
        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testAppendArrayVariable()
    {
        $entry_vars1 = [ 'foo' => [ 'type' => 'set', 'value' => [ 4 ] ] ];
        $entry_vars2 = [ 'foo' => [ 'type' => 'append', 'value' => 2 ] ];
        $expected = [ 'foo' => [ 4, 2 ] ];

        $state1 = new State(self::S1, StateInterface::TYPE_INITIAL, [ State::OPTION_ENTRY_VARS => $entry_vars1 ]);
        $state2 = new State(self::S2, StateInterface::TYPE_FINAL, [ State::OPTION_ENTRY_VARS => $entry_vars2 ]);
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state1->onEntry($subject);
        $state2->onEntry($subject);

        $this->assertEquals($expected, $subject->getExecutionContext()->getParameters()->toArray());
    }

    public function testCustomOperationMap()
    {
        $entry_vars = [ 'foo' => [ 'type' => 'set', 'value' => 'hello world' ] ];
        $operation_map = [ 'set' => CustomVariableOperation::CLASS ];

        $state = new State(
            self::S1,
            StateInterface::TYPE_INITIAL,
            [ State::OPTION_ENTRY_VARS => $entry_vars, State::OPTION_OPERATION_MAP => $operation_map ]
        );
        $subject = new GenericSubject(self::FSM_NAME, self::S1);

        $state->onEntry($subject);

        $this->assertEquals('dlrow olleh', $subject->getExecutionContext()->getParameter('foo'));
    }
}
