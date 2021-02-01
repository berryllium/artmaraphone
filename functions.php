<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once('config.php');

function sendTelegram($method, $data, $chat_id, $headers = []) {
    $data['chat_id'] = $chat_id;
    $ch = curl_init();
    curl_setopt_array($ch, [
      CURLOPT_POST => 1,
      CURLOPT_HEADER => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => 'https://api.telegram.org/bot'. TOKEN .'/'.$method,
      CURLOPT_POSTFIELDS => json_encode($data),
      CURLOPT_HTTPHEADER => array_merge(["Content-Type: application/json"], $headers)
    ]);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
  }
  
  function getDB() {
    if (!file_exists(DB_FILE_PATH)) return [];
    $str = file_get_contents(DB_FILE_PATH);
    if ($str) {
      return unserialize($str);
    } else {
      return [];
    }
  }
  
  function setDB($db) {
    file_put_contents(DB_FILE_PATH, serialize($db));
    return false;
  }
  
  function saveUser($chat_id, $user_name = '', $video = 0) {
    $db = getDB();
    $db[$chat_id] = ['user' => $user_name, 'video' => $video];
    setDB($db);
    return false;
  }
  
  function removeUser($chat_id) {
    $db = getDB();
    unset($db[$chat_id]);
    setDB($db);
    return false;
  }
  
  function sendMessage($chat_id, $message) {
    $method = 'sendMessage';
    $sendData = [
      'text' => $message,
      'chat_id' => $chat_id
    ];
    sendTelegram($method, $sendData, $chat_id);
    return false;
  }
  
  function massSend() {
    require_once('messages.php');
    $db = getDB();
    if(!count($db)) return false;
    $k = 0;
    foreach($db as $chat_id => $user) {
      $video = $user['video'];
      $name = $user['user'];
      // учитываем ограничение рассылки - не более 30 сообщение в секунду  
      $k++;
      if ($k == 30) {
          sleep(1);
          $k = 0;
      }
      $method = 'sendMessage';
      if($video == 1) {
        $video ++;
        sendTelegram($method, $message3_now, $chat_id);
        saveUser($chat_id, $name, $video);
      } elseif($video == 2) {
        $video++;
        sendTelegram($method, $message4_now, $chat_id);
        saveUser($chat_id, $name, $video);
      } elseif($video == 3) {
        sendTelegram($method, $message5_now, $chat_id);
        sendTelegram($method, $qustion_1, $chat_id);
        removeUser($chat_id);
      }
    }
  }
  