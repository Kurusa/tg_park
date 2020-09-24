<?php

namespace App\Commands;

use App\Services\TelegramKeyboard;
use CURLFile;

class MainMenu extends BaseCommand {

    function processCommand($par = false)
    {
        $user_name = $this->tg_parser::getUserName();
        $text = "Привет, <a href='tg://resolve?domain=" . $user_name . "'>" . $user_name . "</a> ✌️

Наш бот с удовольствием расскажет Вам:

✅ о нашем проекте,
✅ как заработать свой первый миллион,
✅ как избавиться от долгов, кредитов и ипотек,
✅ как приобрести собственную недвижимость за 12 мес.

Постараемся ответить на все Ваши вопросы!

В любом случае, Вы всегда можете связаться с нами и задать вопросы лично.😊
Либо оставить заявку на обратный звонок! 📲

Также мы расскажем, как в нашем проекте зарабатывают от студента до пенсионера, как меняется жизнь в лучшую сторону наших партнеров, расскажу, почему наш проект стоит вашего внимания и как стать финансово свободным человеком!

Изучите все подробно и до конца!

Определённо, Вы откроете много интересного и удивительного для себя! 👍";
        TelegramKeyboard::addButton('Главное меню', ['a' => 'main_menu']);
        $this->tg->sendPhoto(new CURLFile($_SERVER['DOCUMENT_ROOT'] . '/src/start.jpg'), $text, TelegramKeyboard::get());
    }

}