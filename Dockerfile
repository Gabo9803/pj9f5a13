FROM php:8.3-apache

# Instal·lar extensions necessàries
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configurar permisos per a l'usuari www-data
RUN chown -R www-data:www-data /var/www/html

# Exposar el port 80
EXPOSE 80

# Arrencar Apache
CMD ["apache2-foreground"]
