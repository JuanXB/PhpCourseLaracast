# Usar la imagen oficial de PHP con Apache
FROM php:apache

# Instalar las extensiones PHP necesarias (puedes agregar las que necesites)
RUN docker-php-ext-install mysqli pdo_mysql

# Copiar el archivo de configuración de Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

COPY php-config.ini /usr/local/etc/php/conf.d/php-config.ini

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Crea un directorio para las sesiones y cambia el propietario y el grupo
USER root

RUN mkdir -p /var/www/html/sessions && chown -R www-data:www-data /var/www/html/sessions

# Reiniciar Apache
RUN service apache2 restart
