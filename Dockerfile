# Imagen base oficial de PHP
FROM php:8.2.12-apache

# Extensiones necesarias
RUN apt-get update && apt-get install -y \
    git \
    nano \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar módulos de Apache
RUN a2enmod rewrite

# Configura el nombre del servidor
RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf

# Copia el código fuente al directorio de trabajo
COPY . /var/www/html

# Modificar DocumentRoot en la configuración de Apache
#RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Da permisos correctos al directorio de la aplicación
RUN chown -R www-data:www-data /var/www/html && \
        find /var/www/html -type d -exec chmod 755 {} \; && \
        find /var/www/html -type f -exec chmod 644 {} \;
        


# Expone el puerto 8000 para acceder a la aplicación
EXPOSE 8000
