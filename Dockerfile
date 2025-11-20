FROM serversideup/php:8.4.1-fpm-nginx AS base

USER root

RUN install-php-extensions intl bcmath

USER www-data

FROM base AS development

# We can pass USER_ID and GROUP_ID as build arguments
# to ensure the www-data user has the same UID and GID
# as the user running Docker.
ARG USER_ID
ARG GROUP_ID

# Switch to root so we can set the user ID and group ID
USER root
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID  && \
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

# Switch back to the unprivileged www-data user
USER www-data

# Node build stage for assets
FROM node:22-alpine AS node-build

WORKDIR /app

COPY package*.json ./

# Install dependencies
RUN npm ci

# Copy source files needed for build
COPY resources ./resources
COPY vite.config.js ./
COPY postcss.config.js ./
COPY tailwind.config.js ./
COPY public ./public

# Build assets
RUN npm run build

FROM base AS build

COPY --chown=www-data:www-data . /var/www/html
USER www-data

RUN composer install --no-dev --prefer-dist --optimize-autoloader

FROM base AS production

ENV PHP_OPCACHE_ENABLE=1
ENV AUTORUN_ENABLED="true"

# Copy laravel app
COPY --chown=www-data:www-data --from=build /var/www/html /var/www/html
# Copy build assets from node-build stage
COPY --chown=www-data:www-data --from=node-build /app/public/build /var/www/html/public/build
USER www-data
