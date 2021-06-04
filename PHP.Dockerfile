FROM php:fpm

RUN apt-get update && apt-get install -y libzip-dev zip curl libcurl4-openssl-dev libpng-dev && apt-get clean -y

RUN docker-php-ext-install pdo pdo_mysql mysqli zip curl

RUN docker-php-ext-configure gd