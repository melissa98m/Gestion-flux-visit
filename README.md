Test gestion de flux visiteurs

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

Documentation de l'API

Cette API permet d'accéder aux informations des entreprises , visites, visiteurs et statuts de visite en utilisant des points d'extrémité RESTful. Voici comment vous pouvez interagir avec l'API :
Obtenir la liste des visites

    GET /api/visits

Cette requête renverra la liste de toutes les visits enregistrées dans le système, avec leurs informations associées. Voici un exemple de réponse JSON :

    json
    
    "status": "Success",
        "data": [
            {
                "id": 1,
                "visit_start": "2023-08-25 14:23:44",
                "visit_end": "2023-08-26 14:23:44",
                "visit_purpose": "test",
                "visit_comment": "",
                "visitor_id": 1,
                "status_id": 1,
                "created_at": null,
                "updated_at": null
            }
        ]

Obtenir les détails d'une visits


    GET /api/visits/{id}

Cette requête renverra les détails de la visite avec l'ID spécifié dans le chemin. Par exemple, pour obtenir les détails de la visite avec l'ID 1 :


    GET /api/visits/1

Créer une nouvelle visite

    POST /api/visits

Pour créer une nouvelle visite, envoyez une requête POST avec les données de la visite au format JSON dans le corps de la requête. Voici un exemple de corps de requête :

    json
    
    {
        "visit_start": "2023-08-25 14:23:44",
        "visit_end": "2023-08-26 14:23:44",
        "visit_purpose": "test",
        "visit_comment": "",
        "visitor_id": 1,
        "status_id": 1,
    }

Mettre à jour les informations d'une visite


    PUT /api/visits/{id}

Pour mettre à jour les informations d'une visite, envoyez une requête PUT avec les données mises à jour au format JSON dans le corps de la requête. Par exemple, pour mettre à jour la visite avec l'ID 1 :


    PUT /api/visits/1

    json
    
    {
            "visit_start": "2023-08-25 14:23:44",
            "visit_end": "2023-08-26 14:23:44",
            "visit_purpose": "Modifier",
            "visit_comment": "",
            "visitor_id": 1,
            "status_id": 1,
    }

Supprimer une visite



    DELETE /api/visits/{id}

Pour supprimer une visite, envoyez une requête DELETE avec l'ID de la viste à supprimer dans le chemin. Par exemple, pour supprimer la avec l'ID 2 :


    DELETE /api/visits/2

Ceci conclut la documentation de l'API pour la gestion des visites. N'hésitez pas à explorer les différentes fonctionnalités pour interagir avec les données via l'API.

Liste de tout les endpoints

        pour accéder aux entreprises :
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
