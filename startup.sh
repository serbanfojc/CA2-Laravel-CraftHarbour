#!/bin/bash

APP_DIR=/home/site/wwwroot

# Run composer install if vendor is missing
if [ ! -d "$APP_DIR/vendor" ]; then
    cd "$APP_DIR" && composer install --no-dev --optimize-autoloader
fi

# Set storage and cache permissions
chmod -R 775 "$APP_DIR/storage"
chmod -R 775 "$APP_DIR/bootstrap/cache"

# Create SQLite database file if it doesn't exist
touch "$APP_DIR/database/database.sqlite"

# Run migrations
cd "$APP_DIR" && php artisan migrate --force

# Create storage symlink
cd "$APP_DIR" && php artisan storage:link --force

# Rewrite nginx config to use Laravel's public/ as document root
cat > /etc/nginx/sites-enabled/default << 'NGINX'
server {
    listen 8080;
    listen [::]:8080;
    root /home/site/wwwroot/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
NGINX

service nginx reload
