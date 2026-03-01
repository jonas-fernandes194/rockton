FROM php:8.4-fpm

# Dependências do sistema + Node
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libpng-dev libonig-dev libxml2-dev \
    nodejs npm \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD ["php-fpm"]