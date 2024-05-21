# Environnement

- **Ubuntu**
- **MySQL**
- **Composer** version 2.7.2
- **PHP** version 8.2.19 (/usr/bin/php8.2)
- **npm** 10.5.0
- **Laravel**
- **Visual Studio Code**

## Étapes d'exécution

### Création d'une base de données MySQL

1. Créez une base de données nommée `Iot_Monitoring` :
   ```sql
   CREATE DATABASE Iot_Monitoring;


2.  Accordez les privilèges à un utilisateur :
``` sql 
GRANT ALL PRIVILEGES ON Iot_Monitoring.* TO 'nom_de_utilisateur'@'hostname';
FLUSH PRIVILEGES;
```
### Configuration du fichier .env

1. Ouvrez le fichier .env à la racine de votre projet.
Remplissez les informations suivantes :

DB_DATABASE=Iot_Monitoring
DB_USERNAME=nom_de_utilisateur
DB_PASSWORD=mot_de_passe_de_utilisateur


## Installation des dépendances

1. Installez les dépendances PHP :
composer install

2. Installez les dépendances Node.js :
npm install

## Génération de la clé d'application

1. Générez une clé d'application :
php artisan key:generate

## Configuration de la base de données

1. Exécutez les migrations pour créer les tables de la base de données :
php artisan migrate

2. Si vous souhaitez pré-remplir la base de données avec des données de test, exécutez :
php artisan db:seed


## Planification de la génération de données
Pour planifier la génération de données en utilisant cron qui appelle le planificateur de Laravel :

1. Ouvrez crontab pour édition :

crontab -e
Si c'est la première fois que vous utilisez cron, il vous demandera de choisir un éditeur, faites-le.

2. Ajoutez la ligne suivante pour exécuter la génération de données chaque minute :

* * * * * /usr/bin/php /chemin/absolu/vers/Iot-Monitoring/artisan generate-data >> /chemin/vers/fichier_de_log/Iot-Monitoring/log/file.log 2>&1

3. Enregistrez et fermez le fichier.

4. Redémarrez le service cron :
sudo service cron restart

## Exécution de l'application
1. Lancez les commandes suivantes pour exécuter l'application :

npm run dev & php artisan servel


2. cliquer sur ce lien:
 INFO  Server running on [http://127.0.0.1:8000]. 







