FROM php:8.3-apache 
#j'installe ici les dependances de mon projet

RUN docker-php-ext-install pdo pdo_mysql mysqli

# Active le module rewrite d'Apache
RUN a2enmod rewrite



# WORKDIR /var/www/html/boutique-en-ligne


#copier maintenant tout les fichiers nécedsaires dans le container
COPY ./src .

#droits , pour lire , écrire dans les fichiers inclus dans le dossier 
RUN chown -R www-data:www-data /var/www/html/