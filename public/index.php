<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use Pokedex\Controllers\CoreController;
use Pokedex\Controllers\MainController;
use Pokedex\Controllers\ErrorController;
use Pokedex\Controllers\PokemonController;

// ====================
// ====== ROUTER ======
// ====================

$router = new AltoRouter();

// le répertoire (après le nom de domaine) dans lequel on travaille est celui-ci
// Mais on pourrait travailler sans sous-répertoire
// Si il y a un sous-répertoire
if (array_key_exists('BASE_URI', $_SERVER)) {
	// Alors on définit le basePath d'AltoRouter
	$router->setBasePath($_SERVER['BASE_URI']);
	// ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
} else { // sinon
	// On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
	$_SERVER['BASE_URI'] = '/';
}

// La page d'accueil

$router->map( 
	'GET',	// Une requete de type GET
	'/',	// Route de la page d'accueil 
	[		// Target 
		'controller' => MainController::class,
		'method' => 'home',
	],
	'home'	// nom de la route
); 

$router->map( 
	'GET',	// Une requete de type GET
	'/pokemon/[i:id]',	// Route de la page d'accueil 
	[		// Target 
		'controller' => PokemonController::class,
		'method' => 'searchPokemon',
	],
	'pokemon'	// nom de la route
); 

$router->map( 
	'GET',	// Une requete de type GET
	'/pokemon/type',	// Route de la page d'accueil 
	[		// Target 
		'controller' => PokemonController::class,
		'method' => 'type',
	],
	'type'	// nom de la route
); 
$router->map( 
	'GET',	// Une requete de type GET
	'/pokemon/type/[i:id]',	// Route de la page d'accueil 
	[		// Target 
		'controller' => PokemonController::class,
		'method' => 'pokemonList',
	],
	'pokemonList'	// nom de la route
); 


$match = $router->match();

// ========================
// ====== DISPATCHER ======
// ========================

// On demande à AltoRouter de trouver une route qui correspond à l'URL courante
$match = $router->match();

// Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
// On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
// 1er argument : la variable $match retournée par AltoRouter
// 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\Pokedex\Controllers\ErrorController::err404');

// On injecte dans le constructeur du CoreController
// Le nom de la route demandée
// ET notre instance d'AltoRouter
if(false === $match) {
	$dispatcher->setControllersArguments('', $router);
} else {
	$dispatcher->setControllersArguments($match['name'], $router);
}

// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();

