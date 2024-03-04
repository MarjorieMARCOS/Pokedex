<?php

namespace Pokedex\Controllers;
use AltoRouter;

class CoreController
{
/**
	 * Instance d'AltRouter
	 *
	 * @var AltoRouter
	 */
	private AltoRouter $router;

    /**
     * Constructeur du CoreController.
     * Cette fonction est appellée pour toute les pages visitée.
     * Elle vérifie : 
     * 1. est que l'utilisateur est bien connecté ET a les bons droits pour accéder à la page
     * 2. si la page doit etre protégée par un token, la fonction vérifie la valeur du token
     *
     * @param [type] $routeName route demandée par le visiteur
     * @param [type] $altoRouter instance d'AltoRouter
     */
    public function __construct($routeName, $altoRouter)
    {
      $this->router = $altoRouter;
    }

    protected function show(string $viewName, $viewData = [])
    {

      // On globalise $router car on ne sait pas faire mieux pour l'instant
		$router = $this->router;

		// Comme $viewData est déclarée comme paramètre de la méthode show()
		// les vues y ont accès
		// ici une valeur dont on a besoin sur TOUTES les vues
		// donc on la définit dans show()
		$viewData['currentPage'] = $viewName;

		// définir l'url absolue pour nos assets
		$viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';
		// définir l'url absolue pour la racine du site
		// /!\ != racine projet, ici on parle du répertoire public/
		$viewData['baseUri'] = $_SERVER['BASE_URI'];

    	require_once __DIR__ . '/../views/header.tpl.php';
		require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
		require_once __DIR__ . '/../views/footer.tpl.php';
    }

    protected function redirect() {
		header('Location: ' . $this->router->generate('error-404'));
		exit();
	  }

}