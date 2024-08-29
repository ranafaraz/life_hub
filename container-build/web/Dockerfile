#
# Use this dockerfile to run the application.
#
# Start the server using docker-compose:
#
#   docker-compose build
#   docker-compose up
#
# NOTE: In future examples replace {{volume_name}} with your projects desired volume name
#
# You can install dependencies via the container:
#
#   docker-compose run {{volume_name}} composer install
#
# You can manipulate dev mode from the container:
#
#   docker-compose run {{volume_name}} composer development-enable
#   docker-compose run {{volume_name}} composer development-disable
#   docker-compose run {{volume_name}} composer development-status
#
# OR use plain old docker 
#
#   docker build -f Dockerfile-dev -t {{volume_name}} .
#   docker run -it -p "8080:80" -v $PWD:/var/www {{volume_name}}

# in a case docker unable to load libraries from web add following DNS and iptables tags
# 1- Open Docker desktop.
# 2- Click top right Settings(gear) icon
# 3- Click docker engin tab from left menu tabs
# 4- Add following at the end of cofiguration object
#    ,
#      "dns": [
#        "8.8.8.8",
#        "8.8.4.4"
#      ],
#      "iptables": true
#
FROM php:7.4-apache
#FROM php:7.4-cli

RUN apt-get update \
 && apt-get install -y vim git zlib1g-dev libzip-dev libpng-dev \
 && apt-get install -y libssh2-1-dev libssh2-1 \
 && pecl install ssh2-alpha \
 && docker-php-ext-enable ssh2 \
 && docker-php-ext-install zip mysqli pdo_mysql \
 && pecl install xdebug-2.9.0 \
 && docker-php-ext-enable xdebug \
 && echo 'extension=ldap' >> /usr/local/etc/php/conf.d/ldap.ini \
 && echo 'xdebug.remote_enable=on' >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.remote_host=host.docker.internal' >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.remote_port=9000' >>  /usr/local/etc/php/conf.d/xdebug.ini \
 && a2enmod rewrite \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer \
 && echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf

# Setting up memory limit
RUN echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

RUN apt-get install -y libldap2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install ldap \
    && docker-php-ext-install gd \
    && apt-get purge -y --auto-remove libldap2-dev

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN service apache2 restart

WORKDIR /var/www/html

