# Usar la imagen oficial de PHP con Apache
FROM php:apache

# Instalar las extensiones PHP necesarias (puedes agregar las que necesites)
RUN docker-php-ext-install mysqli pdo_mysql

# Copiar el archivo de configuración de Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Reiniciar Apache
RUN service apache2 restart
