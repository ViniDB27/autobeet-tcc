# installar dependencias

docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs

# Alias
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

# Subir container
sail up -d --build

# Gerar interface
sail yarn dev
