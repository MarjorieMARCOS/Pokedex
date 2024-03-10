
# Pokedex

Un pokédex est une sorte de dictionnaire de tous les pokémon (petites créatures fictives et adorables). Ces derniers peuvent se battre
et disposent de caractéristiques de combat appelées statistiques. Chaque pokémon possède aussi un ou deux types (plante, roche, feu...).

Le projet est fait en MVC.

# Stack utilisées  

PHP, MYSQL, CSS avec Bootsrap et HTML.

## Installation

1. Installer les dépendances avec `composer install`
2. Importer la base de données `docs/database.sql`
3. Créer le fichier `app/config.ini` à partir du fichier `app/config.ini.dist` et le compléter avec les informations de connexion à la base de données
4. Installer `https://packagist.org/packages/benoclock/alto-dispatcher`


## Models

Création des trois models afin de récupérer les données de la base de données.

- `Pokemon` : qui permettra de récupérer les informations d'un ou plusieurs Pokemon
- `Type` : qui permettra de récupérer le ou les types des Pokemon
- `CoreModel` : qui est le parent de `Pokemon` et `Type`

## Controlleurs

Création des deux controllers : 

- `MainController` = (extends de `CoreController`) qui permettra d'afficher la page home et va ainsi lister tous les Pokemon dans la BDD
- `PokemonController` = (extends de `MainController`) qui permet la page des type et le détail sur un Pokemon
- `CoreController` = (extends de `MainController`) qui permet d'afficher les tpl avec la méthode `show` 
- `ErrorController` = (extends de `CoreController`) qui permet d'afficher pages d'error 
