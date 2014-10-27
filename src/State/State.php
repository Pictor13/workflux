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
     * @var string OPTION_OPERATION_MAP
     */
    const OPTION_OPERATION_MAP = 'operation_map';

    /**
     * @var string OPTION_ENTRY_VARS
     */
    const OPTION_ENTRY_VARS = 'entry_vars';

    /**
     * @var string OPTION_EXIT_VARS
     */
    const OPTION_EXIT_VARS = 'exit_vars';

    /**
     * @var array $default_operation_map
     */
    protected static $default_operation_map = [
        'set' => SetVariableOperation::CLASS,
        'unset' => UnsetVariableOperation::CLASS,
        'increment' => IncrementVariableOperation::CLASS,
        'decrement' => DecrementVariableOperation::CLASS,
        'append' => AppendVariableOperation::CLASS
    ];

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
     * @var array $entry_operations
     */
    protected $entry_operations;

    /**
     * @var array $exit_operations
     */
    protected $exit_operations;

    /**
     * Creates a new State instance.
     *
     * @param string $name
     * @param string $type
     * @param array $options
     */
    public function __construct($name, $type = self::TYPE_ACTIVE, array $options = [])
    {
        $this->assertType($type);

        $this->name = $name;
        $this->type = $type;

        $this->options = new ImmutableOptions($options);
        $this->hydrateVariableOptions();
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

        $this->interpolateVariables($subject, $this->entry_operations);
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

        $this->interpolateVariables($subject, $this->exit_operations);
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

    /**
     * Initializes the members, that are required for applying entry- and exit-variable-operations.
     */
    protected function hydrateVariableOptions()
    {
        $this->operation_map = array_merge(
            self::$default_operation_map,
            $this->getOption(self::OPTION_OPERATION_MAP, new ImmutableOptions)->toArray()
        );

        $this->entry_operations = $this->buildVariableOperationMap(
            $this->getOption(self::OPTION_ENTRY_VARS, new ImmutableOptions)
        );

        $this->exit_operations = $this->buildVariableOperationMap(
            $this->getOption(self::OPTION_EXIT_VARS, new ImmutableOptions)
        );
    }

    /**
     * Builds a list of VariableOperationInterface implementations off of the given options.
     *
     * @param ImmutableOptions $variable_opts
     *
     * @return array
     */
    protected function buildVariableOperationMap(ImmutableOptions $variable_ops)
    {
        $variable_operations = [];

        foreach ($variable_ops->toArray() as $var_name => $operation) {
            $operation_class = $this->resolveOperationClass($operation);
            $variable_operations[] = new $operation_class(
                $var_name,
                isset($operation['value']) ? $operation['value'] : null
            );
        }

        return $variable_operations;
    }

    /**
     * Resolves an VariableOperationInterface implementor based on the given operation data.
     *
     * @param array $operation
     *
     * @return string Class name of a concrete VariableOperationInterface implementation.
     *
     * @throws Error If the operation type/class information is invalid.
     */
    protected function resolveOperationClass(array $operation)
    {
        $operation_type_id = $this->validateOperationType($operation);
        $operation_class = $this->operation_map[$operation_type_id];

        if (!class_exists($operation_class)) {
            throw new Error(sprintf('The given operation class "%s" could not be loaded.', $operation_class));
        }

        return $operation_class;
    }

    /**
     * Validates the type key of the given operation meta-data array.
     *
     * @param array $operation
     *
     * @return string Type id corresponding to the given operation
     *
     * @throws Error If the type is not registered within the operation-map or is completely missing.
     */
    protected function validateOperationType(array $operation)
    {
        if (!isset($operation['type'])) {
            throw new Error('Missing "type" information for the given operation. Maybe missing within the config?');
        }

        if (!isset($this->operation_map[$operation['type']])) {
            throw new Error(
                sprintf(
                    'The given operation type: "%s" is not supported. Supported are: %s',
                    $operation['type'],
                    implode(', ', array_keys($this->operation_map))
                )
            );
        }

        return $operation['type'];
    }

    /**
     * Runs the given list of variable operations on the given subject's execution-context.
     *
     * @param StatefulSubjectInterface $subject
     * @param ImmutableOptions $variable_opts
     */
    protected function interpolateVariables(StatefulSubjectInterface $subject, array $variable_ops)
    {
        $execution_ctx = $subject->getExecutionContext();

        foreach ($variable_ops as $variable_operation) {
            $variable_operation->apply($execution_ctx);
        }
    }
}
