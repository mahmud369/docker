# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install mysqli pdo pdo_mysql gd
