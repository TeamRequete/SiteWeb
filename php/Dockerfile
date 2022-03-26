ARG PHP_VERSION=""
FROM php:${PHP_VERSION:+${PHP_VERSION}-}fpm-alpine

RUN apk update; \
    apk upgrade;

RUN docker-php-ext-install pdo pdo_mysql
COPY ./php.ini /usr/local/etc/php/php.ini
