# Use this Dockerfile to run the application.
# Start the server using docker-compose:
#   docker-compose build
#   docker-compose up

FROM php:8.2.15-apache

# Install required dependencies and PHP extensions
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        ca-certificates \
        vim \
        git \
        unzip \
        zlib1g-dev \
        libzip-dev \
        libpng-dev \
        libssh2-1-dev \
        libldap2-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libonig-dev \
        libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        zip \
        mysqli \
        pdo_mysql \
        gd \
        ldap \
    && pecl install ssh2-alpha \
    && docker-php-ext-enable ssh2 \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo 'xdebug.mode=debug' >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo 'xdebug.client_port=9003' >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo 'xdebug.start_with_request=yes' >> /usr/local/etc/php/conf.d/xdebug.ini \
    && a2enmod rewrite \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Set PHP memory limit
RUN echo 'memory_limit = -1' > /usr/local/etc/php/conf.d/docker-php-memlimit.ini

# Set the working directory to the root of the CodeIgniter project
WORKDIR /var/www/html

# Copy Composer files
COPY ../../composer.json ./

# Install dependencies, generating composer.lock if it doesn’t exist
RUN composer install --no-dev --optimize-autoloader || composer update --no-dev --optimize-autoloader

# Restart Apache to apply changes
RUN service apache2 restart

# Expose the Apache port
EXPOSE 80

#docker-compose down
#docker-compose build --no-cache
#docker-compose up
