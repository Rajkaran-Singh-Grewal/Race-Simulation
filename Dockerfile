FROM php:8.0.17-zts-buster
COPY ./src /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./Run.php"]