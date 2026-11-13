FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

RUN echo "upload_max_filesize = 20M\npost_max_size = 25M\nmemory_limit = 128M" > /usr/local/etc/php/conf.d/uploads.ini
