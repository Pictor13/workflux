<?php

namespace Workflux\StateMachine;

use Workflux\IStatefulSubject;

interface IStateMachine
{
    public function getName();

    public function execute(IStatefulSubject $subject, $event_name);

    public function getCurrentStateFor(IStatefulSubject $subject);

    public function getInitialState();

    public function getFinalStates();

    public function getEventStates();

    public function getStates();

    public function getState($state_name);

    public function isEventState($state_name);

    public function getTransitions($state_name = null, $event_name = null);
}
