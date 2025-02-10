# Usa una imagen base de Debian
FROM debian:latest

# Actualiza los repositorios y instala Nginx
RUN apt-get update && apt-get install -y \
    nginx \
    && rm -rf /var/lib/apt/lists/*

# Copia los certificados al contenedor
COPY certificados/certificate.crt /etc/nginx/certificate.crt
COPY certificados/private.key /etc/nginx/private.key

# Copia la configuración personalizada de Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Copia el archivo index.html
COPY index.html /usr/share/nginx/html/index.html

# Ajusta los permisos de los certificados para ser legibles por Nginx
RUN chmod 600 /etc/nginx/certificate.crt /etc/nginx/private.key

# Asegura que los archivos de configuración y el contenido web sean legibles por el usuario www-data
RUN chown -R www-data:www-data /etc/nginx /usr/share/nginx/html

# Expone los puertos 80 (HTTP) y 443 (HTTPS)
EXPOSE 80 443

# Inicia Nginx cuando el contenedor se ejecute
CMD ["nginx", "-g", "daemon off;"]
