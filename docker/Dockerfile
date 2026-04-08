FROM php:8.3

RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    unzip \
    git \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    intl \
    zip \
    bcmath \
    soap \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN chown -R www-data:www-data /var/www

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]




