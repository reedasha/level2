FROM php:7.1.8-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


ADD . /var/www
COPY ["composer.json", "composer.lock", "/var/www/html/"]
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN composer install

RUN chown -R www-data:www-data /var/www \
    && a2enmod rewrite

