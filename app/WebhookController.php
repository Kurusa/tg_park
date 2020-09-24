<?php

namespace App;

use App\Models\User;
use App\Utils\Api;
use TelegramBot\Api\Client;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;
use TelegramBot\Api\Types\Update;

class WebhookController
{

    public function handle()
    {
        $client = new Client(getenv('TELEGRAM_BOT_TOKEN'));


        $client->on(function (Update $update) {
            $bot = new Api(env('TELEGRAM_BOT_TOKEN'));

            if ($update->getCallbackQuery()) {
            } else {
                $user = User::where('chat_id', $update->getMessage()->getFrom()->getId())->first();
                if (!$user) {
                    User::create([
                        'chat_id' => $update->getMessage()->getFrom()->getId(),
                        'status' => 'done',
                    ]);
                    $user = User::where('chat_id', $update->getMessage()->getFrom()->getId())->first();
                }

                User::where('chat_id', $update->getMessage()->getFrom()->getId())->update([
                    'status' => 'done'
                ]);
                $config = require_once(__DIR__ . '/config/reply_buttons.php');
                $text = $update->getMessage()->getText();
error_log(json_encode($user));
error_log(json_encode($user[0]));
error_log(json_encode($user['id']));
                if ($text === '/start') {
                    $this->startMessage($update, $bot, $config);
                } elseif ($text == 'Задать вопрос менеджеру') {
                    $bot->sendMessage($update->getMessage()->getFrom()->getId(), 'Напишите ваш вопрос и он будет отправлен менеджеру', 'html', false, null, new ReplyKeyboardMarkup([
                        ['📝Главное меню'],
                    ], false, true));

                    $user = User::where('chat_id', $update->getMessage()->getFrom()->getId())->update([
                        'status' => 'ask'
                    ]);
                } elseif ($user->status == 'ask') {
                    $bot->sendMessage(822319793, $update->getMessage()->getText() . "\n" . "<a href='tg://user?id=" . $update->getMessage()->getFrom()->getId() . "'>" . $update->getMessage()->getFrom()->getFirstName() . '</a>', 'html');
                    User::where('chat_id', $update->getMessage()->getFrom()->getId())->update([
                        'status' => 'done'
                    ]);
                    $this->startMessage($update, $bot, $config);
                } else {
                    $user = User::where('chat_id', $update->getMessage()->getFrom()->getId())->update([
                        'status' => 'done'
                    ]);
                    $work_config = false;
                    foreach ($config as $key => $item) {
                        //error_log($key . ' - ' . $text . "\n");
                        if ($key == $text) {
                            $work_config = $config[$key];
                            break;
                        }
                    }
                    if ($work_config) {
                        $send_text = '';
                        if (isset($work_config['name'])) {
                            $text_path = __DIR__ . '/../texts/' . $work_config['name'] . '.txt';
                            $send_text = file_exists($text_path) ? file_get_contents($text_path) : '';
                            $send_text = str_replace('__NAME__', $update->getMessage()->getFrom()->getUsername(), $send_text);
                        }
                        $photo = isset($work_config['photo']) ? $work_config['photo'] : false;

                        $buttons = isset($work_config['buttons']) ? $work_config['buttons'] : false;
                        if ($photo) {
                            if ($buttons) {
                                $bot->sendPhoto($update->getMessage()->getFrom()->getId(), new \CURLFile(__DIR__ . '/../src/' . $photo), $send_text, null, new ReplyKeyboardMarkup($buttons, false, true));
                            } else {
                                $bot->sendPhoto($update->getMessage()->getFrom()->getId(), new \CURLFile(__DIR__ . '/../src/' . $photo), $send_text);
                            }

                        } elseif ($buttons) {
                            $bot->sendMessage($update->getMessage()->getFrom()->getId(), $send_text, 'html', false, null, new ReplyKeyboardMarkup($buttons, false, true));
                        } elseif ($send_text) {
                            $bot->sendMessage($update->getMessage()->getFrom()->getId(), $send_text, 'html');
                        }


                        if (isset($work_config['file'])) {
                            foreach ($work_config['file'] as $file) {
                                $file_path = __DIR__ . '/../src/' . $file;
                                $file = file_exists($file_path) ? file_get_contents($file_path) : '';
                                if ($file) {
                                    $bot->sendDocument($update->getMessage()->getFrom()->getId(), new \CURLFile($file_path));
                                }
                            }
                        }
                    } else {
                        $bot->sendMessage($update->getMessage()->getFrom()->getId(), "Упс, видимо я не знаю ответ, попробуйте выбрать что-то из меню.", 'html');
                    }
                }
            }

        }, function (Update $update) {
            return true;
        });

        $client->run();
    }

    /**
     * @param $update
     * @param $bot
     * @param $config
     */
    function startMessage($update, $bot, $config)
    {
        $text_path = __DIR__ . '/../texts/start.txt';
        $text = file_exists($text_path) ? file_get_contents($text_path) : '';
        $buttons = isset($config['start']['buttons']) ? $config['start']['buttons'] : false;
        $photo = isset($config['start']['photo']) ? $config['start']['photo'] : false;

        if ($photo) {
            $bot->sendPhoto($update->getMessage()->getFrom()->getId(), new \CURLFile(__DIR__ . '/../src/' . $photo), $text, null, new ReplyKeyboardMarkup($buttons, false, true), false, 'html');
        } else {
            $bot->sendMessage($update->getMessage()->getFrom()->getId(), $text, 'html', false, null, new ReplyKeyboardMarkup($buttons, false, true), false);
        }
    }

}
