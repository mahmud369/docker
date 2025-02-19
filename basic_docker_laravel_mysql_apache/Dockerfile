# Use an official PHP runtime as a parent image
FROM php:8.2-apache

# Set the working directory to /app
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    vim

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Copy composer.json
COPY laravel_app/composer.json /var/www/html/

# Copy composer.lock
COPY laravel_app/package.json /var/www/html/

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Change the DocumentRoot to point to the public directory
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/default-ssl.conf

CMD ["apache2-foreground"]

# Change permission
USER root
RUN chmod -R 777 /var/www/html

# Install composer dependencies
# > chmod -R 777 /var/www/html
# > composer install
# > php artisan key:generate
# > php artisan migrate