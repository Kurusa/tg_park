<?php
return [

    'broker_country_uk' => [
        'name' => 'select_broker_money',
        'buttons' => [[
            [
                'text' => 'до $2 000',
                'callback_data' => json_encode([
                    'a' => 'broker_money_uk_1',
                ])
            ], [
                'text' => '$2 000-$10 000',
                'callback_data' => json_encode([
                    'a' => 'broker_money_uk_2',
                ])
            ], [
                'text' => 'от $10 000',
                'callback_data' => json_encode([
                    'a' => 'broker_money_uk_3',
                ])
            ],
        ]]
    ],
    'broker_country_rus' => [
        'name' => 'select_broker_money',
        'buttons' => [[
            [
                'text' => 'до $2 000',
                'callback_data' => json_encode([
                    'a' => 'broker_money_ru_1',
                ])
            ], [
                'text' => '$2 000-$10 000',
                'callback_data' => json_encode([
                    'a' => 'broker_money_ru_2',
                ])
            ], [
                'text' => 'от $10 000',
                'callback_data' => json_encode([
                    'a' => 'broker_money_ru_3',
                ])
            ],
        ]]
    ],

    'broker_money_uk_1' => [
        'name' => 'broker_money_uk_1'
    ],
    'broker_money_uk_2' => [
        'name' => 'broker_money_uk_2'
    ],
    'broker_money_uk_3' => [
        'name' => 'broker_money_uk_3'
    ],

    'broker_money_ru_1' => [
        'name' => 'broker_money_ru_1'
    ],
    'broker_money_ru_2' => [
        'name' => 'broker_money_ru_2'
    ],
    'broker_money_ru_3' => [
        'name' => 'broker_money_ru_3'
    ],


    'fond' => [
        'name' => 'fond',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'where_to_investigate_back',
                ])
            ],
        ]]
    ],
    'ipo' => [
        'name' => 'ipo',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'where_to_investigate_back',
                ])
            ],
        ]]
    ],
    'crypto' => [
        'name' => 'crypto',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'where_to_investigate_back',
                ])
            ],
        ]]
    ],


    'study_1' => [
        'name' => 'study_1',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'study',
                ])
            ],
        ]]
    ],
    'study_2' => [
        'name' => 'study_2',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'study',
                ])
            ],
        ]]
    ],
    'study_3' => [
        'name' => 'study_3',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'study',
                ])
            ],
        ]]
    ],
    'study_4' => [
        'name' => 'study_4',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'study',
                ])
            ],
        ]]
    ],
    'study_5' => [
        'name' => 'study_5',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'study',
                ])
            ],
        ]]
    ],
    'study_6' => [
        'name' => 'study_6',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'study',
                ])
            ],
        ]]
    ],
    'study_7' => [
        'name' => 'study_7',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'study',
                ])
            ],
        ]]
    ],


    'study' => [
        'name' => 'study',
        'buttons' => [
            [[
                'text' => '1',
                'callback_data' => json_encode([
                    'a' => 'study_1',
                ])
            ]],
            [[
                'text' => '2',
                'callback_data' => json_encode([
                    'a' => 'study_2',
                ])
            ]],
            [[
                'text' => '3',
                'callback_data' => json_encode([
                    'a' => 'study_3',
                ])
            ]],
            [[
                'text' => '4',
                'callback_data' => json_encode([
                    'a' => 'study_4',
                ])
            ]],
            [[
                'text' => '5',
                'callback_data' => json_encode([
                    'a' => 'study_5',
                ])
            ]],
            [[
                'text' => '6',
                'callback_data' => json_encode([
                    'a' => 'study_6',
                ])
            ]],
            [[
                'text' => '7',
                'callback_data' => json_encode([
                    'a' => 'study_7',
                ])
            ]],
        ]
    ],

    'want_as_you' => [
        'name' => 'want_as_you',
        'buttons' => [[
            [
                'text' => 'назад',
                'callback_data' => json_encode([
                    'a' => 'where_to_investigate_back',
                ])
            ],
        ]]
    ],

    'where_to_investigate_back' => [
        'name' => 'where_to_investigate',
        'buttons' =>  [
            [[
                'text' => 'Фондовый рынок',
                'callback_data' => json_encode([
                    'a' => 'fond',
                ])
            ]],
            [[
                'text' => 'IPO',
                'callback_data' => json_encode([
                    'a' => 'ipo',
                ])
            ]],
            [[
                'text' => 'Криптовалюты',
                'callback_data' => json_encode([
                    'a' => 'crypto',
                ])
            ]],
            [[
                'text' => 'Хочу как ты',
                'callback_data' => json_encode([
                    'a' => 'want_as_you',
                ])
            ]],
        ]
    ]
];