FROM php:8.2.2-cli

ARG USER=consumer
ARG UID=1000

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions sockets @composer

RUN useradd --create-home --shell /bin/bash -U $USER -u $UID

USER $USER
