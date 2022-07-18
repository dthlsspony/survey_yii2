# survey_yii2

## Запуск из Windows

При установленном OpenServer:
- Склонировать репозиторий внутрь htdocs в директории OpenServer
- В настройках OpenServer настроить домен для survey на директорию survey_yii2/app
- В survey_yii2/app/config/db.php исправить настройки для БД (БД survey уже должна быть создана)
- Открыть терминал Git Bash, из директории survey_yii2/app запустить composer install для подгрузки необходимых библиотек
- После перезагрузки OpenServer проект будет доступен по указанному домену

Без OpenServer:
- Скачать PHP версии 7.2-7.4
- Скачать и установить Composer
- Скачать и установить MySQL 5.4
- Склонировать репозиторий
- Через терминал запустить composer install из survey_yii2/app
- После запустить сервер через команду php yii serve
- Сайт будет доступен по http://localhost:8080