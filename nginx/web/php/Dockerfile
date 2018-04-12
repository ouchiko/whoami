FROM php:7.1-fpm-alpine


RUN apk add --update --no-cache \
libcurl \
curl-dev \
sqlite \
sqlite-dev


RUN docker-php-ext-install mysqli pdo_mysql pdo_sqlite curl

COPY nginx/api/src /var/www/html

RUN rm -rf /var/www/html/logs/* \
    && chown -R www-data:www-data /var/www/html
