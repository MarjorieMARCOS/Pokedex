<?php

namespace Pokedex\Controllers;
use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class MainController extends MainController
{

    /***
     * Fonction qui permet d'afficher un pokemon en particulier et qui va l'afficher
     * dans le tpl "detail"
     * 
     * @params = id du pokemon recherché
     */
    public function searchPokemon ($params)
    {
        $pokemonModel = new Pokemon();
        $pokemon =  $pokemonModel->find($params);
        if (false == $pokemonModel) {
			$this->redirect();
		}

        $pokemonModel = new Type();
        $listOfType = $pokemonModel->findAllTypeOfPokemon($params);


        $data = [];
        $data['pokemon'] = $pokemon;
        $data['listOfType'] = $listOfType;
        $this->show('detail', $data);
    }


    /***
     * Fonction qui permet d'afficher tous les types et va les 
     * afficher dans le tpl "type"
     * 
     */
    public function type ()
    {
        $listModel = new Type();
        $listOfType = $listModel->findAll();
        if (false == $listModel) {
			$this->redirect();
		}

        $data = [];
        $data['listOfType'] = $listOfType;
        $this->show('type', $data);
    }


    /***
     * Fonction qui permet d'afficher tous les pokemon d'un seul type
     * afficher dans le tpl "home"
     * 
     */
    public function pokemonList($params)
    {
        $idType = $params;
        $pokemonModel = new Pokemon();
        $pokemonList =  $pokemonModel->findAllPokemonByType($idType);

        if (false == $pokemonModel) {
			$this->redirect();
		}
        $data = [];
        $data['pokemonList'] = $pokemonList;
        $this->show('home', $data);
    }

}