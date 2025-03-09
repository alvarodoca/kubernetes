# Usamos PHP con FPM
FROM php:8.2-fpm

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Configurar el directorio de la web
WORKDIR /var/www/html

# Copiar los archivos PHP a la imagen
COPY . /var/www/html

# Dar permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto de PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
