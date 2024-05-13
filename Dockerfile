# Use the official PHP image from Docker Hub, based on PHP 8.2
FROM php:8.2-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy project files into the container
COPY . /var/www/html
