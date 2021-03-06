FROM php:7.1-apache
RUN apt-get update && apt-get -y install git unzip

RUN DEFAULT_SITE_FILE=/etc/apache2/sites-enabled/000-default.conf && TMP=$(mktemp) && sed 's!/var/www/html!/var/www/html/public!' $DEFAULT_SITE_FILE > $TMP && mv $TMP $DEFAULT_SITE_FILE
RUN a2enmod rewrite
RUN apt-get install -y libmemcached-dev zlib1g-dev && pecl install memcached-3.0.3 && docker-php-ext-enable memcached

COPY . /var/www/html

WORKDIR /var/www/html
RUN sh -c 'if [ ! -x /var/www/html/composer.phar ]; then curl https://getcomposer.org/installer | php; fi'
RUN ./composer.phar install

RUN chown -R www-data:www-data /var/www/html

