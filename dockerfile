# Dockerfile
FROM php:8.2-apache

# Instalar extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo pdo_mysql xml exif \
    && docker-php-ext-enable exif \
    && docker-php-ext-install gd mbstring pdo pdo_mysql xml

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and npm
RUN apt-get update && apt-get install -y nodejs npm

# Copiar el archivo de configuración personalizado para Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Ajustar permisos para Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html \
    && a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80
