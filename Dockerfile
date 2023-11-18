FROM php:apache
RUN docker-php-ext-install mysqli
COPY php.ini /usr/local/etc/php/conf.d/php.ini
COPY . /var/www/html


