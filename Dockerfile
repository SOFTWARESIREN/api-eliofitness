FROM webdevops/php-apache:8.2-alpine

# Configurar directorio de trabajo
WORKDIR /app

# Instalar dependencias del sistema
RUN apk add --no-cache git libpq-dev

# Copiar archivos de la aplicación
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

# Instalar dependencias de PHP sin scripts
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-interaction --no-scripts --no-dev --prefer-dist --ignore-platform-reqs

# Generar clave manualmente (sin usar artisan)
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN echo "APP_KEY=base64:$(openssl rand -base64 32)" >> .env

# Exponer puerto
EXPOSE 80

# Comando de inicio
CMD ["supervisord"]