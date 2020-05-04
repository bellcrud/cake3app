FROM alpine:3.10

## Packageインストール
RUN apk add --update --no-cache php7 php7-pdo_mysql php7-openssl php7-curl php7-json php7-mbstring \
    php7-apache2 php7-pdo_odbc php7-pdo_mysql php7-gd php7-pecl-apcu php7-mysqli php7-fpm php7-intl php7-phar php7-dom php7-xml php7-simplexml php7-tokenizer php7-xmlwriter php7-session apache2

COPY ./docker/app/php.ini /usr/local/lib/php.ini

## composerをインストール
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /usr/bin/composer
ENV PATH $PATH:/composer/vendor/bin

COPY ./sample /var/www/html/sample/
WORKDIR /var/www/html/sample/
RUN composer install --no-interaction
RUN chmod -R a+w ./logs/error.log
COPY ./docker/app/httpd.conf /etc/apache2/httpd.conf

CMD sed -i -e "s/Listen 80/Listen $PORT/g" /etc/apache2/httpd.conf && httpd -DFOREGROUND