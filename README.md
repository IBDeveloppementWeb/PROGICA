## Projet PROGICA

Vous trouverez le cahier des charges du projet ici :
[PROGICA](https://afpa-tethys.scenari.eu/RessourcesResw/MTQwMDg5NQ==_1611215438316/co/techSupport.xhtml)

### Exercice
---
- Installer un projet Symfony
- Mettre en place la première page (Controller/Route)
- Mettre en place la base de donnée (Config)
- Créer une entité Gite
- Ajouter un Gite via l'apppication (EntityManager)
- Créer un Dashboard pour l'administrateur
- Mettre en place un CRUD pour les Gites dans la partie Admin
- Mettre en place les contraintes de Validation pour les formulaires
- Mettre en place un système de pagination pour tous les Gites
- Mettre en place un formulaire de recherche de Gite avec la possibilité de rechercher
     - Par surface min
     - Par Chambre max
     - Si les animaux sont accepté 
     - Par Ville
     - Par équipement 
- Mettre en place un formulaire de contact avec Maildev
- Insérer de l'animation avec Webpack

### Installation sur votre machine
- git clone "https://github.com/SilverVladDev/PROGICA.git"
- composer update
- npm install
- Vérifier fichier .env pour faire la modification de la DATABASE_URL
- php bin/console doctrine:database:create
- php bin/console doctrine:migration:migrate
- php bin/console doctrine:fixtures:load

### Lancer le site
- php -S localhost:8000 -t public
- npm run dev-server

### Lancer le serveur SMTP
- maildev
