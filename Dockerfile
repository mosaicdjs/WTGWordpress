# Use your preferred version as the base
FROM wordpress:php8.2-apache

# Install the system library needed for XSL and the PHP extension itself
RUN apt-get update && apt-get install -y libxslt1-dev \
    && docker-php-ext-install xsl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

