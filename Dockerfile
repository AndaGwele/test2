
FROM php:8.2-apache

# Enable required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy your PHP files into the container
COPY . /var/www/html/

# Enable Apache rewrite module (if needed)
RUN a2enmod rewrite
