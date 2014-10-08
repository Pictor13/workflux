<?php

return [
    'name' => 'video_transcoding',
    'states' => [
        'new' => [
            'name' => 'new',
            'type' => 'initial',
            'class' => null,
            'events' => [
                'promote' => [
                    'name' => 'promote',
                    'transitions' => [
                        [
                            'outgoing_state_name' => 'transcoding',
                            'guard' => [
                                'class' => 'Workflux\Guard\ExpressionGuard',
                                'options' => [
                                    'expression' => 'params.transcoding_required'
                                ]
                            ]
                        ],
                        [
                            'outgoing_state_name' => 'ready',
                            'guard' => [
                                'class' => 'Workflux\Guard\ExpressionGuard',
                                'options' => [
                                    'expression' => 'not params.transcoding_required'
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
            'events' => [
                '_sequential' => []
            ]
        ],
        'ready' => [
            'name' => 'ready',
            'type' => 'final',
            'class' => null,
            'events' => [
                '_sequential' => []
            ]
        ]
    ]
];
