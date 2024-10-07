# Wybierz obraz PHP z Apache
FROM php:8.3-apache

# Upewnij się, że mamy zainstalowane wszystkie zależności
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Instalacja Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Skopiuj pliki aplikacji do katalogu roboczego kontenera
COPY . /var/www/html

# Ustaw katalog roboczy
WORKDIR /var/www/html

# Zainstaluj zależności PHP
RUN composer install --no-interaction --optimize-autoloader

# Ustaw prawa do plików
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Ustawienie uprawnień do plików w katalogu "storage" i "bootstrap/cache"
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Włącz mod_rewrite w Apache dla obsługi route'ów Laravel
RUN a2enmod rewrite

# Kopiuj plik konfiguracyjny Apache
COPY ./docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Uruchom ponownie Apache
CMD ["apache2-foreground"]
