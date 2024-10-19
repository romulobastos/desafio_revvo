FROM php:7.4-apache

# install docker extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# activate apache2 mod_rewrite
RUN a2enmod rewrite

# php default folder
WORKDIR /var/www/html