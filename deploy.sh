#!/bin/bash
  composer install --no-dev --optimize-autoloader
  npm install
  npm run build
  chmod -R 755 public/css public/js
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache