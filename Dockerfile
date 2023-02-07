
FROM alpine:3.13
COPY . /home/app
COPY resources/docker/nginx.conf /etc/nginx/http.d/default.conf
COPY resources/docker/app.ini /etc/php8/conf.d/app.ini
COPY resources/docker/entrypoint /usr/bin/entrypoint
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /home/app

RUN apk update \
#        && apk upgrade \
        && apk add nginx postfix curl cyrus-sasl cyrus-sasl-login  \
	    && apk add php8 php8-cli php8-fpm php8-bcmath php8-phar php8-tokenizer php8-curl php8-json php8-openssl php8-zip php8-pdo php8-mysqli php8-pdo_mysql php8-mysqlnd php8-dom php8-mbstring php8-session php8-fileinfo php8-gd php8-calendar php8-xml php8-xmlwriter php8-simplexml php8-exif php8-ctype php8-iconv php8-xmlreader php8-xmlwriter php8-simplexml \
        && ln -s /usr/bin/php8 /usr/bin/php \
        && ln -s /usr/sbin/php-fpm8 /usr/bin/php-fpm \
        && nginx -v && php -v && php-fpm -v \
        && mkdir -p /run/nginx \
        && mkdir -p /home/app/public \
        && chmod -R 777 /home/app/public \
        && touch    /home/app/storage/logs/laravel.log \
        && chmod -R 777 /home/app/storage \
        && mkdir -p /home/app/bootstrap/cache \
        && chmod -R 777 /home/app/bootstrap/cache \
        && composer install \
        && chmod a+x /usr/bin/entrypoint

EXPOSE 80

CMD exec /usr/bin/entrypoint
