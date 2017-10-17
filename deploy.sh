#!/bin/bash

# Shutdown the app
# php artisan down
# Pulling latest changes
git pull origin master
# Install composer while optimizing
composer install --no-dev --optimize-autoloader
# Optimizing cache
php artisan cache:clear
php artisan route:cache
php artisan config:cache
# Migrate db changes
php artisan migrate --force
# Install new node modules
# npm install
# Compile frontend
# npm run production
# Restart the queue
service supervisor restart
# Turn on the app
# php artisan up