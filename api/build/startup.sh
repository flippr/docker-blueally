#!/bin/bash

echo "Drop Databases if they exist"
php /var/www/api/bin/console doctrine:schema:drop --force

echo "Create Databases"
php /var/www/api/bin/console doctrine:database:create

echo "Create Schema"
php /var/www/api/bin/console doctrine:schema:create

echo 'Run data fixtures'
php /var/www/api/bin/console doctrine:fixtures:load -n