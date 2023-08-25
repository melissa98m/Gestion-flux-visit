Projet Laravel CRUD avec API

Ce projet Laravel est conçu pour démontrer la mise en place d'un CRUD (Create, Read, Update, Delete) ainsi que la création d'une API pour interagir avec les données. Le projet utilise le framework Laravel pour la création d'une application web avec des fonctionnalités CRUD et une API pour accéder à ces fonctionnalités.
Installation

    Cloner le dépôt vers votre machine locale :
    git clone "https://github.com/melissa98m/Gestion-fux-visit"
    cd Gestion-fux-visit





    Installer les dépendances du projet via Composer :



composer install

    Copier le fichier .env.example en .env et configurer votre base de données.



cp .env.example .env
php artisan key:generate

    Exécuter les migrations pour créer les tables de base de données :



php artisan migrate

    Exécuter le serveur de développement :



php artisan serve

Fonctionnalités

    CRUD complet pour la gestion des visites :
        Création, lecture, mise à jour et suppression d'entreprises.
    
    CRUD complet pour la gestion des entreprises et visiteurs :
        Création, lecture, mise à jour et suppression.

    CRUD complet pour la gestion des statuts des visites :
        Création, lecture, mise à jour et suppression.

    L'authentification des utilisateurs pour la gestion du CRUD est gérée par Laravel Breeze, qui fournit un système d'authentification simple et minimaliste. Vous pouvez vous connecter, vous inscrire et vous déconnecter pour accéder aux fonctionnalités CRUD.
        
    API: pour accéder aux entreprises :
        GET /api/companies : Obtenir la liste des entreprises.
        GET /api/companies/{id} : Obtenir les détails d'une entreprise par son ID.
        POST /api/companies : Créer une nouvelle entreprise.
        PUT /api/companies/{id} : Mettre à jour les informations d'une entreprise.
        DELETE /api/companies/{id} : Supprimer une entreprise.

        pour accéder aux statuts :
        GET /api/status : Obtenir la liste des statuts.
        GET /api/status/{id} : Obtenir les détails d'un status par son ID.
        POST /api/status : Créer un nouveau statut de visite.
        PUT /api/status/{id} : Mettre à jour les informations d'un statut.
        DELETE /api/status/{id} : Supprimer un status.

        pour accéder aux visites :
        GET /api/visits : Obtenir la liste des visits.
        GET /api/visits/{id} : Obtenir les détails d'une visites par son ID.
        POST /api/visits : Créer une nouvelle  visite.
        PUT /api/visits/{id} : Mettre à jour les informations d'une visite.
        DELETE /api/visits/{id} : Supprimer une visite.

        pour accéder aux visiteurs :
        GET /api/visitors : Obtenir la liste des visiteurs.
        GET /api/visitors/{id} : Obtenir les détails d'un visiteurs par son ID.
        POST /api/visitors : Créer un nouveau  visiteur.
        PUT /api/visitors/{id} : Mettre à jour les informations d'un visiteur.
        DELETE /api/visitors/{id} : Supprimer une visiteur.
