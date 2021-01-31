<?php

$link_hello = 'https://www.youtube.com/watch?v=6WOxNwv0SvE';
$link_1 = 'https://www.youtube.com/watch?v=9OBStGhbhA0';
$link_2 = 'https://www.youtube.com/watch?v=pwfKLfqoMeM';
$link_3 = 'https://www.youtube.com/watch?v=KpoichJc-9Q';
$link_4 = 'https://yandex.ru';
$link_tg = 'https://t.me/Olga_privalova_art';

$day = date('H') > 17 ? 'завтра' : 'сегодня';

$message_default = 'Извините, этого я не умею';

$message1 = [
    'text' => 'Привет! Вы подписались на Арт-Марафон! ' . $link_hello,
];

$message2_1 = [
    'text' => "Первый урок запранирован на 17.00 по МСК $day",
    'reply_markup' => [
        "resize_keyboard" => true,
        "inline_keyboard" => [
            [
                [
                'text' => 'Ок 17.00',
                'callback_data' => 'lesson_1_later'
                ],
                [
                'text' => 'Хочу прямо сейчас',
                'callback_data' => 'lesson_1_now'
                ]
            ]
        ]
    ]
];

$message2_2 = [
    'text' => "Второй урок запранирован на 17.00 по МСК $day",
    'reply_markup' => [
        "resize_keyboard" => true,
        "inline_keyboard" => [
            [
                [
                'text' => 'Ок 17.00',
                'callback_data' => 'lesson_2_later'
                ],
                [
                'text' => 'Хочу прямо сейчас',
                'callback_data' => 'lesson_2_now'
                ]
            ]
        ]
    ]
];

$message2_3 = [
    'text' => "Третий урок запранирован на 17.00 по МСК $day",
    'reply_markup' => [
        "resize_keyboard" => true,
        "inline_keyboard" => [
            [
                [
                'text' => 'Ок 17.00',
                'callback_data' => 'lesson_3_later'
                ],
                [
                'text' => 'Хочу прямо сейчас',
                'callback_data' => 'lesson_3_now'
                ]
            ]
        ]
    ]
];

$message3_later = [
    'text' => 'Хорошо!'
];

$message3_now = [
    'text' => $link_1
];

$message4_later = [
    'text' => 'Хорошо!'
];

$message4_now = [
    'text' => $link_2
];

$message5_later = [
    'text' => 'Хорошо!'
];

$message5_now = [
    'text' => $link_3
];

$message6_1 = [
    'text' => $link_4
];

$message6_2 = [
    'text' => $link_4
];

$message_tg = [
    'text' => "По этой ссылке вы можете получить помощь $link_tg"
];

$message_thanks = [
    'text' => "Спасибо за внимание!"
];

$qustion_1 = [
    'text' => 'Скажите, вам интересна возможность получить творческую профессию и зарабатывать?',
    'reply_markup' => [
        "resize_keyboard" => true,
        "inline_keyboard" => [
            [
                [
                'text' => 'Да',
                'callback_data' => 'q1_y'
                ],
                [
                'text' => 'Нет',
                'callback_data' => 'q1_n'
                ]
            ]
        ]
    ]
];

$qustion_2 = [
    'text' => 'Тогда могу предложить наш марафон, где стоимость от 190 рублей. Интересно?',
    'reply_markup' => [
        "resize_keyboard" => true,
        "inline_keyboard" => [
            [
                [
                'text' => 'Да',
                'callback_data' => 'q2_y'
                ],
                [
                'text' => 'Нет',
                'callback_data' => 'q2_n'
                ]
            ]
        ]
    ]
];

$qustion_3 = [
    'text' => "Ок. Вот ссылка на сайт, где можно выбрать подходящий тариф $link_4. Нужна помощь?",
    'reply_markup' => [
        "resize_keyboard" => true,
        "inline_keyboard" => [
            [
                [
                'text' => 'Да',
                'callback_data' => 'q3_y'
                ],
                [
                'text' => 'Нет',
                'callback_data' => 'q3_n'
                ]
            ]
        ]
    ]
];
