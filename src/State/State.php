<?php

namespace Workflux\State;

use Workflux\Error\Error;
use Workflux\StatefulSubjectInterface;
use Params\Immutable\ImmutableOptionsTrait;
use Params\Immutable\ImmutableOptions;

/**
 * The State class is a standard implementation of the StateInterface.
 */
class State implements StateInterface
{
    use ImmutableOptionsTrait;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $type
     */
    protected $type;

    /**
     * @var array $operation_map
     */
    protected $operation_map;

    /**
     * @var array $entry_actions
     */
    protected $entry_actions;

    /**
     * @var array $exit_actions
     */
    protected $exit_actions;

    /**
     * Creates a new State instance.
     *
     * @param string $name
     * @param string $type
     * @param array $entry_actions
     * @param array $exit_actions
     * @param array $options
     */
    public function __construct(
        $name,
        $type = self::TYPE_ACTIVE,
        array $entry_actions = [],
        array $exit_actions = [],
        array $options = []
    ) {
        $this->assertType($type);

        $this->name = $name;
        $this->type = $type;
        $this->entry_actions = $entry_actions;
        $this->exit_actions = $exit_actions;
        $this->options = new ImmutableOptions($options);
    }

    /**
     * Returns the state's name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the state's type.
     *
     * @return string One the StateInterface::TYPE_* constant values.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Tells if a the state is the initial state of the state machine it belongs to.
     *
     * @return bool
     */
    public function isInitial()
    {
        return $this->type === self::TYPE_INITIAL;
    }

    /**
     * Tells if a the state is a active state of the state machine it belongs to.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->type === self::TYPE_ACTIVE;
    }

    /**
     * Tells if a the state is a final state of the state machine it belongs to.
     *
     * @return bool
     */
    public function isFinal()
    {
        return $this->type === self::TYPE_FINAL;
    }

    /**
     * Propagates the new state machine position to the execution-context of the given subject
     * and applies the transition-entry interpolations to the latter's variables.
     *
     * @param StatefulSubjectInterface $subject
     */
    public function onEntry(StatefulSubjectInterface $subject)
    {
        $subject->getExecutionContext()->onStateEntry($this);

        foreach ($this->entry_actions as $entry_action) {
            $entry_action->apply($subject->getExecutionContext());
        }
    }

    /**
     * Propagates the new state machine position to the execution-context of the given subject
     * and applies the transition-exit interpolations to the latter's variables.
     *
     * @param StatefulSubjectInterface $subject
     */
    public function onExit(StatefulSubjectInterface $subject)
    {
        $subject->getExecutionContext()->onStateExit($this);

        foreach ($this->exit_actions as $exit_action) {
            $exit_action->apply($subject->getExecutionContext());
        }
    }

    /**
     * Asserts that the given state is one of: TYPE_INITIAL, TYPE_ACTIVE, TYPE_FINAL
     *
     * @param string $state_type
     *
     * @throws Error If the given type is not supported.
     */
    protected function assertType($state_type)
    {
        $allowed_types = [ self::TYPE_INITIAL, self::TYPE_ACTIVE, self::TYPE_FINAL ];

        if (!in_array($state_type, $allowed_types)) {
            throw new Error(
                sprintf(
                    'Invalid state type "%s" given.' .
                    ' Only the types %s are permitted.',
                    $state_type,
                    implode(', ', $allowed_types)
                )
            );
        }
    }
}
