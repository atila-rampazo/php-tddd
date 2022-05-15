FROM php:8.0.5-fpm-alpine as base
RUN  apk update && apk upgrade &&  apk add $PHPIZE_DEPS

FROM base as dev
WORKDIR /app
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN docker-php-ext-install sockets pdo_mysql

FROM dev as ci
WORKDIR /app
COPY . .
RUN composer install
RUN cp .env.example .env

FROM ci as prod
WORKDIR /app
# ESSE COMANDO REMOVE TODAS AS DEPENDENCIAS DE DESENVOLVIMENTO
RUN composer install --no-dev

FROM base as finish
WORKDIR /app
COPY --from=prod --chown=www-data /app .
