FROM node:latest AS node
FROM php:7.4-fpm

ARG user
ARG uid

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# RUN docker-php-ext-install iconv pdo_mysql pdo_sqlite pgsql pdo_pgsql mysqli gd exif intl xsl json soap dom zip opcache
# RUN docker-php-ext-enable iconv pdo_mysql pdo_sqlite pgsql pdo_pgsql mysqli gd exif intl xsl json soap dom zip opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /usr/local/bin/node /usr/local/bin/node
RUN ln --symbolic ../lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln --symbolic ../lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx
    

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

COPY ./hnh /var/www
COPY --chown=$user:$user hnh /var/www
WORKDIR /var/www

USER $user

EXPOSE 9000