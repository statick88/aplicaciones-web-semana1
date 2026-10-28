FROM php:8.5-apache

WORKDIR /var/www/html

COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY index.php style.css statick.png favicon.svg Calculator.php /var/www/html/
COPY tests/ /var/www/html/tests/

RUN chown -R www-data:www-data /var/www \
    && find /var/www -type d -exec chmod 755 {} \; \
    && find /var/www -type f -exec chmod 644 {} \;

EXPOSE 80

HEALTHCHECK --interval=10s --timeout=3s --start-period=5s --retries=3 \
    CMD php -r 'exit(@file_get_contents("http://127.0.0.1/") === false ? 1 : 0);'
