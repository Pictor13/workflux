<?php

return [
    'video_transcoding' => [
        'class' => 'Workflux\StateMachine\EventEmittingStateMachine',
        'name' => 'video_transcoding',
        'states' => [
            'new' => [
                'name' => 'new',
                'type' => 'initial',
                'entry_actions' => [
                    [
                        'type' => 'set',
                        'variable' => [ 'name' => 'foo', 'value' => 42 ],
                        'options' => []
                    ],
                    [
                        'type' => 'increment',
                        'variable' => [ 'name' => 'foo', 'value' => null ],
                        'options' => []
                    ]
                ],
                'exit_actions' => [
                    [
                        'type' => 'unset',
                        'variable' => [ 'name' => 'foo', 'value' => null ],
                        'options' => []
                    ]
                ],
                'class' => null,
                'options' => [],
                'events' => [
                    'promote' => [
                        'name' => 'promote',
                        'transitions' => [
                            [
                                'outgoing_state_name' => 'transcoding',
                                'guard' => [
                                    'class' => 'Workflux\Guard\ExpressionGuard',
                                    'options' => [
                                        'expression' => 'params.transcoding_required',
                                        'options_list' => [ 23, 5 ]
                                    ]
                                ]
                            ],
                            [
                                'outgoing_state_name' => 'ready',
                                'guard' => [
                                    'class' => 'Workflux\Guard\ExpressionGuard',
                                    'options' => [
                                        'expression' => 'not params.transcoding_required',
                                        'options_map' => [
                                            'key_one' => 'value_one',
                                            'key_two' => true,
                                            'key_three' => [
                                                'nested_key' => 'nested_value'
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    '_sequential' => []
                ]
            ],
            'transcoding' => [
                'name' => 'transcoding',
                'type' => 'active',
                'class' => 'Workflux\Tests\Parser\Xml\Fixture\CustomState',
                'entry_actions' => [],
                'exit_actions' => [],
                'options' => [],
                'events' => [
                    '_sequential' => [
                        [
                            'outgoing_state_name' => 'ready',
                            'guard' => [
                                'class' => 'Workflux\Guard\ExpressionGuard',
                                'options' => [
                                    'expression' => 'params.transcoding_success'
                                ]
                            ]
                        ],
                        [
                            'outgoing_state_name' => 'error',
                            'guard' => [
                                'class' => 'Workflux\Guard\ExpressionGuard',
                                'options' => [
                                    'expression' => 'not params.retry_limit_reached and not params.transcoding_success'
                                ]
                            ]
                        ],
                        [
                            'outgoing_state_name' => 'rejected',
                            'guard' => [
                                'class' => 'Workflux\Guard\ExpressionGuard',
                                'options' => [
                                    'expression' => 'params.retry_limit_reached and not params.transcoding_success'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'error' => [
                'name' => 'error',
                'type' => 'active',
                'class' => null,
                'entry_actions' => [],
                'exit_actions' => [],
                'options' => [],
                'events' => [
                    'promote' => [
                        'name' => 'promote',
                        'transitions' => [
                            [
                                'outgoing_state_name' => 'transcoding',
                                'guard' => null
                            ]
                        ]
                    ],
                    'demote' => [
                        'name' => 'demote',
                        'transitions' => [
                            [
                                'outgoing_state_name' => 'rejected',
                                'guard' => null
                            ]
                        ]
                    ],
                    '_sequential' => []
                ]
            ],
            'rejected' => [
                'name' => 'rejected',
                'type' => 'final',
                'class' => null,
                'entry_actions' => [],
                'exit_actions' => [],
                'options' => [ 'notify_owner' => true ],
                'events' => [
                    '_sequential' => []
                ]
            ],
            'ready' => [
                'name' => 'ready',
                'type' => 'final',
                'class' => null,
                'entry_actions' => [],
                'exit_actions' => [],
                'options' => [],
                'events' => [
                    '_sequential' => []
                ]
            ]
        ]
    ]
];
