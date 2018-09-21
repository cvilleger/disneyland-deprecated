FROM webdevops/php-nginx:7.2

COPY . /app
WORKDIR /app

RUN composer install --no-ansi --no-dev --no-interaction --no-progress --optimize-autoloader

EXPOSE 443
