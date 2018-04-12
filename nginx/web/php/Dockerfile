FROM php:7.0-fpm-alpine

RUN docker-php-ext-install mysqli

COPY nginx/api/src /var/www/html

RUN rm -rf /var/www/html/logs/* \
    && chown -R www-data:www-data /var/www/html
