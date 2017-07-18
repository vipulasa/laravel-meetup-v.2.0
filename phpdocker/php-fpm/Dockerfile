FROM phpdockerio/php71-fpm:latest

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install sqlite3 libsqlite3-dev php-memcached php7.1-mysql php7.1-sqlite3 php7.1-imap php-imagick php7.1-interbase php7.1-mbstring php-yaml php-xhprof php-xdebug \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


WORKDIR "/application"
