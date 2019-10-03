#!/bin/bash

COMPOSER=$(which composer)
cd ~/challenge/challenge/api && COMPOSER_MEMORY_LIMIT=-1 composer install --no-interaction
cd ~/challenge/challenge && docker-compose -f docker-compose.yml up -d

echo -n "Waiting for docker to catch up."
sleep 10

cd ~/challenge/challenge/ && docker-compose -f docker-compose.yml exec fpm bash /var/www/api/build/startup.sh

echo "ready for your api routes"
