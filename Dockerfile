FROM ahmadarif/docker-laravel:latest

WORKDIR /var/www/html
COPY . .
RUN composer install

EXPOSE 80
ENTRYPOINT ["/usr/bin/supervisord"]
