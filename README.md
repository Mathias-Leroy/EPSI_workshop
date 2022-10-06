# Projet WORKSHOP EPSI
Bienvenue sur notre application web utilisant [**Symfony**](https://symfony.com/doc/5.4/setup.html) !

## Commandes dans l'éditeur de texte

### Initialiser le projet
- composer create-project symfony/skeleton:"^5.4" **nom_du_dossier**
- cd **nom_du_dossier**
- composer require webapp

### Créer un controller 
- php bin/console make:controller **NomDuController**

### Afficher toutes les routes
- php bin/console debug:router

### Mettre à jour les données de la bdd
- php bin/console doctrine:schema:update --force

### Vérifie tous les templates
- php bin/console lint:twig