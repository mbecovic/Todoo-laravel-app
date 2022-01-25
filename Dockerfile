FROM php

RUN apt-get update

RUN apt-get install -y zip

RUN apt-get install -y git

RUN curl -sS https://getcomposer.org/installer | \
	php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY . .

RUN touch ./database/database.sqlite

RUN composer install

RUN php artisan key:generate

RUN php artisan migrate

RUN php artisan db:seed

CMD php artisan serve --host=0.0.0.0 --port=8080

EXPOSE 8080
