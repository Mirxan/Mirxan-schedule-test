FROM php:8.0.3-fpm

ARG deploy_user
ARG deploy_token
ARG portal_deploy_user
ARG portal_deploy_token

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN curl -sL https://deb.nodesource.com/setup_lts.x | bash - && \
    apt-get update && apt-get install -y \
    nodejs \
    build-essential \
    libpq-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    procps \
    iputils-ping \
    curl && \
    npm install -g npm
#    && pecl install xdebug \
#    && docker-php-ext-enable xdebug

# Install yarn
RUN npm install --global yarn

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql exif pcntl bcmath pdo pdo_pgsql pgsql
RUN ln -s /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
#RUN sed -i -e 's/;extension=pgsql/extension=pgsql/' /usr/local/etc/php/php.ini
#RUN sed -i -e 's/;extension=pdo_pgsql/extension=pdo_pgsql/' /usr/local/etc/php/php.ini

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
EXPOSE 9003
EXPOSE 6001
CMD ["php-fpm"]
