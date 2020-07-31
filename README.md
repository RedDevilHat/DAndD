# DAndD

Небольшой пет проект для друзей. 
Предоставляет площадку для игры в D&D (и подобные игры)

Для запуска

Скопируйте фаил `.env` в `.env.local`
Скопируйте фаил `docker-compose.yaml` в `docker-compose.override.yaml`

Выполнните `docker-compose up -d`

потом `docker-compose exec php zsh` и внутри контейнера `sf d:m:m`

