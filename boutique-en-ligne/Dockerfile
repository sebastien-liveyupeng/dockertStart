FROM php:8.3-apache 
#j'installe ici les dependances de mon projet

RUN docker-php-ext-install pdo pdo_mysql mysqli
# installe les extensions ici

RUN a2enmod rewrite
#me pertmet d'activer les modules que l'ont peut avoir dans les projets en MVC 
# exemple de URL dans le projet http://localhost/index.php?controller=produit&id=5

WORKDIR /var/www/html
#je change le dossier de travail pour le dossier html de apache

#copier maintenant tout les fichiers nécedsaires dans le container
COPY src/ .

#droits , pour lire , écrire dans les fichiers inclus dans le dossier 
RUN chown -R www-data:www-data /var/www/html/