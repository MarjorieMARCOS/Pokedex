<?php

namespace Pokedex\Controllers;
use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class MainController extends CoreController
{
    public function home ()
    {
        $pokemonModel = new Pokemon();
        $pokemonList =  $pokemonModel->findAll();

        if (false == $pokemonModel) {
			$this->redirect();
		}
        $data = [];
        $data['pokemonList'] = $pokemonList;
        $this->show('home', $data);
    }
}