<?php
// подключаем конфиг и функции
require_once('messages.php');
require_once('functions.php');
// получаем и обрабатываем данные
$data = json_decode(file_get_contents('php://input'), true);
$button = @$data['callback_query']['data'];
$data = @$data['callback_query']['message'] ?: $data['message'];
// пишем лог последнего сообщения боту
file_put_contents('2.txt', print_r(2, true));
file_put_contents('bot.txt', print_r($data, true));
// получаем значение кнопки, нажатой пользователем
// получаем текст сообщения
$text = strtolower($data['text']);
// получаем id чата
$chat_id = $data['chat']['id'];

// получаем информацию об отправителе
$user_name = $data['from']['first_name'];

// обрабатываем сообщение
$sendData['chat_id'] = $chat_id;
$method = 'sendMessage';

if($text == '/start') {
  sendTelegram($method, $message1, $chat_id);
  sendTelegram($method, $message2_1, $chat_id);
} elseif($button) {
  switch ($button) {
    case 'lesson_1_later':
      sendTelegram($method, $message3_later, $chat_id);
      $video = 1;
      break;
    case 'lesson_1_now': 
      sendTelegram($method, $message3_now, $chat_id);
      sendTelegram($method, $message2_2, $chat_id);
      break;
    case 'lesson_2_later': 
      sendTelegram($method, $message4_later, $chat_id);
      $video = 2;
      break;
    case 'lesson_2_now': 
      sendTelegram($method, $message4_now, $chat_id);
      sendTelegram($method, $message2_3, $chat_id);
      break;
    case 'lesson_3_later': 
      sendTelegram($method, $message5_later, $chat_id);
      $video = 3;
      break;
    case 'lesson_3_now': 
      sendTelegram($method, $message5_now, $chat_id);
      sendTelegram($method, $qustion_1, $chat_id);
      break;
    case 'q1_n': 
      sendTelegram($method, $qustion_2, $chat_id);
      break;
    case 'q1_y': 
      sendTelegram($method, $qustion_3, $chat_id);
      break;
    case 'q2_n': 
      sendTelegram($method, $message_thanks, $chat_id);
      break;
    case 'q2_y': 
      sendTelegram($method, $message6_1, $chat_id);
      break;
    case 'q3_n': 
      sendTelegram($method, $message_thanks, $chat_id);
      break;
    case 'q3_y': 
      sendTelegram($method, $message_tg, $chat_id);
      break;
    default:
      sendTelegram($method, $message_default, $chat_id);
  }
}


// если пользователя запустил бота, а чата с ним не в базе - добавляем в базу
saveUser($chat_id, $user_name, $video);
// если пользователь остановил бота - удаляем чат с ним из базы
if($text == '/stop') removeUser($chat_id);
