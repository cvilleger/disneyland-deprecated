FROM webdevops/php-nginx:7.2

COPY . /app

WORKDIR /app

ENV WEB_DOCUMENT_ROOT=/app/public \
    PHP_DATE_TIMEZONE=Europe/Paris \
    APP_ENV=dev \
    DATABASE_URL=mysql://root:root@localhost:3306/app_database

EXPOSE 80 443
