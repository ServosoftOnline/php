# ajuste para evitar que el servidor devuelva página HTML. Debe intepretarlo como lenguaje javascript y le indico que uso vite
# Usar una imagen base de Node.js para construir el frontend
FROM node:20 as build

# Establecer el directorio de trabajo
WORKDIR /app

# Copiar archivos del frontend al contenedor
COPY . .

# Instalar dependencias y construir el proyecto
RUN npm install && npm run build

# Usar una imagen base de PHP con Apache para servir el backend y los archivos construidos
FROM php:8.2-apache

# Copiar los archivos construidos al directorio público de Apache
COPY --from=build /app/dist /var/www/html/

# Copiar los archivos del backend al contenedor
COPY ./backend /var/www/html/backend/

# Configurar tipos MIME y permisos
RUN a2enmod rewrite \
    && chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/ \
    && echo 'AddType application/javascript .jsx' >> /etc/apache2/apache2.conf

# Configurar .htaccess para rutas amigables (si es necesario)
RUN echo '<IfModule mod_rewrite.c>\n\
RewriteEngine On\n\
RewriteCond %{REQUEST_FILENAME} !-f\n\
RewriteCond %{REQUEST_FILENAME} !-d\n\
RewriteRule ^ /index.html [L]\n\
</IfModule>' > /var/www/html/.htaccess

# Exponer el puerto 80 para Apache
EXPOSE 80