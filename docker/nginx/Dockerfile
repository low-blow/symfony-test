FROM nginx:alpine

# Copying conf files nginx
COPY nginx.conf /etc/nginx/
COPY default.conf /etc/nginx/conf.d/

# Install bash
RUN apk update && apk upgrade && apk add --no-cache bash

# Setting build-time variables for container during building
ARG PHP_UPSTREAM_CONTAINER=php-fpm
ARG PHP_UPSTREAM_PORT=9000

# Create www-data user and group
RUN set -x ; \
    addgroup -g 82 -S www-data ; \
    adduser -u 82 -D -S -G www-data www-data && exit 0 ; exit 1

# Set upstream conf and remove the default conf
RUN echo "upstream php-upstream { server ${PHP_UPSTREAM_CONTAINER}:${PHP_UPSTREAM_PORT}; }" > /etc/nginx/conf.d/upstream.conf

# Exposes a particular port winside a Docker Container for access from outside
EXPOSE 80
