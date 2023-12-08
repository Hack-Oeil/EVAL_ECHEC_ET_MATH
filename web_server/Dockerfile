FROM php:8.3-apache

WORKDIR /var/www/html

RUN apt update && apt install -y zip unzip git

# Activer le module Apache mod_rewrite
RUN a2enmod rewrite

COPY docker-virtualhost.conf /etc/apache2/sites-available/000-default.conf
COPY www/ .

RUN service apache2 restart

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update

EXPOSE 80