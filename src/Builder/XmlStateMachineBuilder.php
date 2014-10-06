<?php

namespace Workflux\Builder;

use Workflux\Transition\Transition;
use Workflux\State\State;
use Workflux\Guard\IGuard;
use Workflux\StateMachine\StateMachine;
use Workflux\Parser\Xml\StateMachineDefinitionParser;

class XmlStateMachineBuilder extends StateMachineBuilder
{
    public function build()
    {
        $state_machine_definition_file = $this->getOption('state_machine_definition');

        $parser = new StateMachineDefinitionParser();
        $state_machine_definition = $parser->parse($state_machine_definition_file);

        $this->setStateMachineName($state_machine_definition['name']);
        foreach ($state_machine_definition['states'] as $state_name => $state_definition) {
            $state = new State($state_name, $state_definition['type']);
            $this->addState($state);
            $this->addEventTransitions($state_definition);
            $this->addSequentialTransitions($state_definition);
        }

        return parent::build();
    }

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

    protected function addSequentialTransitions(array $state_definition)
    {
        foreach ($state_definition['events'][StateMachine::SEQ_TRANSITIONS_KEY] as $transition_definition) {
            $this->addTransition(
                $this->createTransition($state_definition['name'], $transition_definition)
            );
        }
    }

    protected function createTransition($state_name, array $transition_definition)
    {
        $target = $transition_definition['outgoing_state_name'];
        $guard_definition = $transition_definition['guard'];

        $guard = null;
        if ($guard_definition) {
            $guard = new $guard_definition['class']($guard_definition['options']);

            if (!$guard instanceof IGuard) {
                throw new Error("Configured guard classes must implement " . IGuard::CLASS);
            }
        }

        return new Transition($state_name, $target, $guard);
    }
}
