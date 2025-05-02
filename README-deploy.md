# Despliegue de ElioFitness API en Render

Este documento contiene instrucciones para desplegar la API de ElioFitness en Render.

## Pasos para el despliegue

1. **Crear una cuenta en Render**
   - Regístrate en [render.com](https://render.com/)

2. **Conectar con GitHub**
   - Conecta tu cuenta de GitHub a Render

3. **Crear un nuevo servicio web**
   - Haz clic en "New +" y selecciona "Web Service"
   - Selecciona el repositorio de GitHub
   - Configura el servicio:
     - **Name**: eliofitness-api
     - **Environment**: PHP
     - **Build Command**: `composer install --no-interaction --prefer-dist --optimize-autoloader && php artisan config:cache && php artisan route:cache`
     - **Start Command**: `heroku-php-apache2 public/`

4. **Crear una base de datos PostgreSQL**
   - Haz clic en "New +" y selecciona "PostgreSQL"
   - Configura la base de datos:
     - **Name**: eliofitness-db
     - **Database**: eliofitness
     - **User**: eliofitness_user
     - **Plan**: Free

5. **Conectar la base de datos al servicio web**
   - Copia las credenciales de la base de datos
   - Añade las variables de entorno en el servicio web

6. **Ejecutar migraciones**
   - Una vez desplegado, accede a la shell del servicio
   - Ejecuta: `php artisan migrate --force`

## Variables de entorno necesarias

- `APP_NAME`: ElioFitness
- `APP_ENV`: production
- `APP_KEY`: (generado automáticamente)
- `APP_DEBUG`: false
- `APP_URL`: (URL de Render)
- `DB_CONNECTION`: pgsql
- `DB_HOST`: (host de la base de datos)
- `DB_PORT`: 5432
- `DB_DATABASE`: eliofitness
- `DB_USERNAME`: eliofitness_user
- `DB_PASSWORD`: (contraseña generada)
- `LOG_CHANNEL`: stderr
- `CACHE_DRIVER`: file
- `SESSION_DRIVER`: cookie
- `SESSION_LIFETIME`: 120

## Probar la API

Una vez desplegada, puedes probar la API con Postman o cualquier cliente HTTP:

- **URL Base**: https://eliofitness-api.onrender.com/api
- **Endpoints disponibles**:
  - GET /productos
  - POST /productos
  - GET /productos/{id}
  - PUT /productos/{id}
  - DELETE /productos/{id}
  - Y muchos más según la documentación de la API

## Limitaciones del plan gratuito

- El servicio se "dormirá" después de 15 minutos de inactividad
- La primera solicitud después de la inactividad puede tardar hasta 30 segundos
- Limitado a 750 horas de uso por mes
- Base de datos limitada a 1GB de almacenamiento 