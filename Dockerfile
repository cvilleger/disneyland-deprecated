FROM webdevops/php-nginx:7.2

COPY . /app
WORKDIR /app

ENV APP_ENV=prod
RUN composer install --profile --no-interaction --no-progress --no-suggest --no-dev -o

EXPOSE 443
