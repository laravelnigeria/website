#!/usr/bin/env bash
if [[ -d "./.git" ]]; then
    git pull origin master
fi

composer install --no-interaction

php artisan optimize
php artisan migrate --force

php artisan cache:clear

php artisan config:clear
php artisan config:cache

php artisan route:clear
php artisan route:cache
