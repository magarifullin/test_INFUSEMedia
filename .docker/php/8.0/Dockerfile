FROM php:8.0-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y git curl zip \
  && docker-php-ext-install -j$(nproc) pdo_mysql pcntl \
  && php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \

ADD php.ini /etc/php/8.0/cli/conf.d/99-custom.ini

RUN chown -R www-data:www-data /var/www
