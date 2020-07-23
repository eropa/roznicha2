#Установка php 7.2 + Apache
FROM php:7.2-apache
#Устонавливаем все библиотеки PHP + Драйвер к базе + Функции
RUN docker-php-ext-install pdo_mysql  \
    && a2enmod \
    rewrite

#Устанавливаем GIT
RUN apt-get update && \
        apt-get upgrade -y && \
        apt-get install -y git
#install some base extensions
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-configure zip --with-libzip \
  && docker-php-ext-install zip

#Для сборки JS и стилей
RUN apt-get install -y npm
#Копируем наш VHOST
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
#Устанавливаем COMPOSEr
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc && \
        composer