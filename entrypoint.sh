#!/usr/bin/env bash

docker-compose build;
docker-compose stop;
docker-compose -f docker-compose.yml up -d;
docker-compose exec -T php rm -f /var/www/app/config/parameters.yml;
docker-compose exec -T php composer install --quiet;
docker-compose exec -T php bin/console doctrine:database:create --if-not-exists;
docker-compose exec -T php bin/console doctrine:migrations:migrate --allow-no-migration --quiet;
docker-compose exec -T php bin/console assets:install web --symlink;
docker-compose exec -T php bin/console cache:clear --env=prod;
docker-compose exec -T php bin/console cache:clear --env=dev;
docker-compose exec -T php chmod -R 777 var;
#docker-compose exec -T php npm --prefix ./socketio install ./socketio;
#docker-compose exec -T mysql mysql -u root -proot -h mysql tallium-test < docker-entrypoint-initdb.d/tallium-test.sql;

docker inspect --format='{{.Name}} - {{range .NetworkSettings.Networks}} {{.IPAddress}}{{end}} - {{range $p, $conf := .NetworkSettings.Ports}} {{$p}} {{end}}' $(docker ps -aq)|grep tallium-test