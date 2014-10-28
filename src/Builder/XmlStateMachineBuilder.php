<?php

namespace Workflux\Builder;

use Workflux\Transition\Transition;
use Workflux\State\State;
use Workflux\State\Action\SetVariableAction;
use Workflux\State\Action\UnsetVariableAction;
use Workflux\State\Action\IncrementVariableAction;
use Workflux\State\Action\DecrementVariableAction;
use Workflux\State\Action\AppendVariableAction;
use Workflux\State\StateInterface;
use Workflux\Guard\GuardInterface;
use Workflux\Error\Error;
use Workflux\StateMachine\StateMachine;
use Workflux\Parser\Xml\StateMachineDefinitionParser;

/**
 * The XmlStateMachineBuilder can build/load a state_machine from a given xml file,
 * containing valid state machine declarations.
 */
class XmlStateMachineBuilder extends StateMachineBuilder
{
    protected static $default_action_map = [
        'set' => SetVariableAction::CLASS,
        'unset' => UnsetVariableAction::CLASS,
        'increment' => IncrementVariableAction::CLASS,
        'decrement' => DecrementVariableAction::CLASS,
        'append' => AppendVariableAction::CLASS
    ];

    /**
     * Verifies the builder's current state and builds a state machine off of it.
     *
     * @return Workflux\StateMachine\StateMachineInterface
     */
    public function build()
    {
        $state_machine_definition = $this->resolveStateMachineDefinition();

        $this->setStateMachineName($state_machine_definition['name']);
        if (isset($state_machine_definition['class'])) {
            $this->setStateMachineClass($state_machine_definition['class']);
        }

        foreach ($state_machine_definition['states'] as $state_name => $state_definition) {
            $this->addState($this->createState($state_definition));
            $this->addEventTransitions($state_definition);
            $this->addSequentialTransitions($state_definition);
        }

        return parent::build();
    }

    /**
     * Returns the appropiate parsed state machine definition to use for building the state machine.
     *
     * @return array
     */
    protected function resolveStateMachineDefinition()
    {
        $state_machine_definitions = $this->parseStateMachineDefitions();
        if (!$this->hasOption('name')) {
            throw new Error("Missing required state machine name.");
        }

        $name = $this->getOption('name');
        if (isset($state_machine_definitions[$name])) {
            $state_machine_definition = $state_machine_definitions[$name];
        } else {
            throw new Error(
                sprintf('Unable to find configured state machine with name "%s". Maybe a type?', $name)
            );
        }

        return $state_machine_definition;
    }

    /**
     * Parses the configured state machine definition file and returns all parsed state machine definitions.
     *
     * @return array An assoc array with name of a state machine as key and the state machine def as value.
     */
    protected function parseStateMachineDefitions()
    {
        $state_machine_definition_file = $this->getOption('state_machine_definition');

        $parser = new StateMachineDefinitionParser();

        return $parser->parse($state_machine_definition_file);
    }

    /**
     * Creates a concrete StateInterface instance based on the given state definition.
     *
     * @param array $state_definition
     *
     * @return StateInterface
     */
    protected function createState(array $state_definition)
    {
        $state_implementor = isset($state_definition['class']) ? $state_definition['class'] : State::CLASS;
        $this->loadStateImplementor($state_implementor);

        $entry_actions = [];
        $exit_actions = [];

        $state = new $state_implementor(
            $state_definition['name'],
            $state_definition['type'],
            $this->createTransitionActions($state_definition['entry_actions']),
            $this->createTransitionActions($state_definition['exit_actions']),
            $state_definition['options']
        );

        if (!$state instanceof StateInterface) {
            throw new Error(
                sprintf(
                    'Configured custom implementor for state %s does not implement "%s".',
                    $state_definition['name'],
                    StateInterface::CLASS
                )
            );
        }

        return $state;
    }

    /**
     * Creates an array of ActionInterface implementations based on the given action-data.
     *
     * @param array $actions_data
     *
     * @return array
     */
    protected function createTransitionActions(array $actions_data)
    {
        $actions = [];

        foreach ($actions_data as $action) {
            $action_class = $this->resolveActionClass($action);
            $variable = $action['variable'];
            $actions[] = new $action_class($variable['name'], $variable['value'], $action['options']);
        }

        return $actions;
    }

    /**
     * Resolves an ActionInterface implementor based on the given operation data.
     *
     * @param array $operation
     *
     * @return string Class name of a concrete ActionInterface implementation.
     *
     * @throws Error If the action type/class information is invalid.
     */
    protected function resolveActionClass(array $action)
    {
        $action_type_id = $this->validateActionType($action);
        $action_class = self::$default_action_map[$action_type_id];

        if (!class_exists($action_class)) {
            throw new Error(sprintf('The given operation class "%s" could not be loaded.', $action_class));
        }

        return $action_class;
    }

    /**
     * Validates the type key of the given action meta-data array.
     *
     * @param array $action
     *
     * @return string Type id corresponding to the given action
     *
     * @throws Error If the type is not registered within the action-map or is completely missing.
     */
    protected function validateActionType(array $action)
    {
        if (!isset($action['type'])) {
            throw new Error('Missing "type" information for the given action. Maybe missing within the config?');
        }

        if (!isset(self::$default_action_map[$action['type']])) {
            throw new Error(
                sprintf(
                    'The given action type: "%s" is not supported. Supported are: %s',
                    $action['type'],
                    implode(', ', array_keys(self::$default_action_map))
                )
            );
        }

        return $action['type'];
    }

    /**
     * Tries to autoload the given state implementor if the class doesn't exist.
     *
     * @param array $state_definition
     *
     * @throws Error If the given state implementor can't be loaded.
     */
    protected function loadStateImplementor($state_implementor)
    {
        if (!class_exists($state_implementor, true)) {
            throw new Error(
                sprintf(
                    'Unable to load configured custom state implementor "%s".',
                    $state_implementor
                )
            );
        }
    }

    /**
     * Creates a list of event transitions from the given state definition
     * and adds them to the builder's current state machine setup.
     *
     * @param array $state_definition
     */
    protected function addEventTransitions(array $state_definition)
    {
        foreach ($state_definition['events'] as $event_name => $event_definition) {
            if ($event_name === StateMachine::SEQ_TRANSITIONS_KEY) {
                continue;
            }
            foreach ($event_definition['transitions'] as $transition_definition) {
                $this->addTransition(
                    $this->createTransition($state_definition['name'], $transition_definition),
                    $event_name
                );
            }
        }
    }

    /**
     * Creates a list of sequential transitions from the given state definition
     * and adds them to the builder's current state machine setup.
     *
     * @param array $state_definition
     */
    protected function addSequentialTransitions(array $state_definition)
    {
        foreach ($state_definition['events'][StateMachine::SEQ_TRANSITIONS_KEY] as $transition_definition) {
            $this->addTransition(
                $this->createTransition($state_definition['name'], $transition_definition)
            );
        }
    }

    /**
     * Creates a state transition from the given transition definition.
     *
     * @param string $state_name
     * @param array $transition_definition
     *
     * @return TransitionInterface
     */
    protected function createTransition($state_name, array $transition_definition)
    {
        $target = $transition_definition['outgoing_state_name'];
        $guard_definition = $transition_definition['guard'];

        $guard = null;
        if ($guard_definition) {
            $guard = new $guard_definition['class']($guard_definition['options']);

            if (!$guard instanceof GuardInterface) {
                throw new Error(
                    sprintf("Configured guard classes must implement %s.", GuardInterface::CLASS)
                );
            }
        }

        return new Transition($state_name, $target, $guard);
    }
}
