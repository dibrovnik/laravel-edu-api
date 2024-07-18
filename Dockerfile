# Используем официальный образ PHP с Apache версии 8.2
FROM php:8.2-apache

# Устанавливаем нужные расширения PHP и другие зависимости
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd mbstring zip exif pcntl bcmath opcache

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Настраиваем рабочую директорию
WORKDIR /var/www/html

# Копируем текущий проект в контейнер
COPY . .

# Устанавливаем переменную окружения для Composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Устанавливаем зависимости Laravel
RUN composer install

# Копируем файл настроек Apache
COPY ./docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Включаем модуль Apache mod_rewrite
RUN a2enmod rewrite

# Устанавливаем права на storage и cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Открываем порт 80
EXPOSE 80

# Запускаем Apache
CMD ["apache2-foreground"]
