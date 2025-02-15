FROM php:8.3-fpm

WORKDIR /back/rehem-app

# Composerをインストール
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME "/opt/composer"
ENV PATH "$PATH:/opt/composer/vendor/bin"

# 必要なパッケージをインストール
RUN apt-get update && \
    apt-get -y install git unzip libzip-dev default-mysql-client && \
    apt-get -y install libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-install zip pdo pdo_mysql && \
    docker-php-ext-enable pdo_mysql

# アプリケーションファイルをコピー
COPY . .

EXPOSE 8000

# サーバーを起動
CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]