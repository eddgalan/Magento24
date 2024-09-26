FROM php:7-apache
RUN apt-get update && apt-get install -y unzip git nano
RUN pecl channel-update pecl.php.net && pecl install xdebug-3.0.4 && docker-php-ext-enable xdebug
RUN apt-get update && apt-get install -y libicu-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install intl \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable mysqli pdo pdo_mysql \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
# Set up the working directory and copy files
WORKDIR /var/www/html
COPY ./config_files ./config_files
COPY ./magentoinstall.sh ./magentoinstall.sh
RUN sh ./magentoinstall.sh
# Instalando Composer 1.10.16
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && composer self-update 1.10.16
# RUN chown -R www-data:www-data /var/www/html && chmod -R 775 /var/www/html/
CMD apachectl -DFOREGROUND
