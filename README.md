# telegram_button
Узнаем id своего пользователя, заводим бота при помощи BotFather в telegram
Переименовываем файл config.php.example в config.php 
Прописываем необходимые настройка в файле config.php
После создания бота и размещения на сайте кода нужно привязать его с помощью вебхука - просто в браузере вставить строчку такого вида https://api.telegram.org/bot{ТОКЕН}/setWebhook?url={АДРЕС_САЙТА}
Для запуска массовой рассылки запускаем файл send_message.php из крона или из браузера https://{имя_сайта}/send_message.php