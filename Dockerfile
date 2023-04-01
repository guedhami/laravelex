# Use the official PHP image as base
FROM php:7.4-apache

# Install required dependencies
RUN apt-get update && \
    apt-get install -y git zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the project files to the container
COPY . .

# Install the project dependencies using Composer
RUN composer install --no-interaction --no-plugins --no-scripts

# Set the required file permissions
RUN chown -R www-data:www-data /var/www/html/storage && \
    chown -R www-data:www-data /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage && \
    chmod -R 775 /var/www/html/bootstrap/cache

# Expose port 80 for the web server
EXPOSE 80

# Start the Apache web server in the foreground
CMD ["apache2-foreground"]
