FROM webdevops/php-apache:8.2-alpine

# Configurar directorio de trabajo
WORKDIR /app

# Instalar dependencias del sistema
RUN apk add --no-cache git libpq-dev

# Copiar composer files primero para aprovechar el caché de capas
COPY composer.json composer.lock* ./

# Limpiar caché de composer y actualizar
RUN composer clear-cache

# Instalar dependencias de PHP con una estrategia más flexible
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update --no-interaction && \
    composer install --no-interaction --no-scripts --prefer-dist

# Ahora copiar el resto de la aplicación
COPY . /app

# Establecer permisos
RUN chown -R application:application /app
RUN chmod -R 755 /app/storage /app/bootstrap/cache

# Configurar Apache
ENV WEB_DOCUMENT_ROOT=/app/public
ENV PHP_MEMORY_LIMIT=256M
ENV PHP_MAX_EXECUTION_TIME=60
ENV PHP_POST_MAX_SIZE=64M
ENV PHP_UPLOAD_MAX_FILESIZE=64M

# Generar clave de aplicación si no existe
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN php artisan key:generate --force

# Optimizar la aplicación
RUN php artisan optimize

# Exponer puerto
EXPOSE 80

# Comando de inicio
CMD ["supervisord"]