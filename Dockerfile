FROM php:8.2-apache

# Instalar dependencias del sistema y extensiones de PHP
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libzip-dev \
    zip unzip \
    openssl \
    libcurl4-openssl-dev \
    libevent-dev \
    libicu-dev \
    libssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd zip mysqli pdo pdo_mysql \
    && a2enmod rewrite ssl

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

## Instalar raphf y pecl_http
#RUN pecl install raphf && docker-php-ext-enable raphf \
#    && pecl install pecl_http && docker-php-ext-enable http

WORKDIR /var/www/html

# Copiar la aplicación
COPY ./examen /var/www/html
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Configuración de Apache
COPY ./laravel.conf /etc/apache2/sites-available/laravel.conf
RUN a2dissite 000-default.conf
RUN a2ensite laravel.conf

