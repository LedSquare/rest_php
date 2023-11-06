FROM php:8.1-fpm-alpine

ENV CACHE=--no-cache

RUN docker-php-ext-install pdo_mysql  

RUN apk $CACHE update && apk $CACHE upgrade && apk $CACHE add bash 

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /site


