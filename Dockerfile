FROM php:5.6-apache
RUN apt-get update && apt-get install git libicu-dev  g++ zlib1g-dev libmcrypt-dev -y 
RUN docker-php-source extract
RUN docker-php-ext-install zip mcrypt
RUN a2enmod rewrite
RUN service apache2 restart 


COPY ./server/public/ /var/www/html/
COPY ./server/composer.json /var/www/

RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www/

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --filename=composer --install-dir=/usr/local/bin
RUN php -r "unlink('composer-setup.php');"
RUN cd /var/www/ && composer install