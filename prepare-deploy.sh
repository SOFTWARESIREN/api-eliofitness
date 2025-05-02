#!/bin/bash

# Crear archivos necesarios para el despliegue en Render
echo "Preparando proyecto para despliegue en Render..."

# Crear render.yaml
cat > render.yaml << 'EOL'
services:
  - type: web
    name: eliofitness-api
    env: php
    buildCommand: composer install --no-interaction --prefer-dist --optimize-autoloader && php artisan config:cache && php artisan route:cache
    startCommand: heroku-php-apache2 public/
    envVars:
      - key: APP_ENV
        value: production
      - key: APP_DEBUG
        value: false
      - key: LOG_CHANNEL
        value: stderr
      - key: APP_KEY
        generateValue: true
      - key: APP_NAME
        value: ElioFitness
      - key: CACHE_DRIVER
        value: file
      - key: SESSION_DRIVER
        value: cookie
      - key: SESSION_LIFETIME
        value: 120

databases:
  - name: eliofitness-db
    plan: free
    databaseName: eliofitness
    user: eliofitness_user
EOL

# Crear .htaccess
cat > .htaccess << 'EOL'
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
EOL

# Crear Procfile
echo "web: vendor/bin/heroku-php-apache2 public/" > Procfile

# Crear build.sh
cat > build.sh << 'EOL'
#!/bin/bash
# Ejecutar migraciones después del despliegue
php artisan migrate --force
EOL
chmod +x build.sh

echo "¡Listo! Archivos para despliegue creados correctamente."
echo "Ahora puedes subir estos cambios a GitHub y crear tu servicio en Render." 