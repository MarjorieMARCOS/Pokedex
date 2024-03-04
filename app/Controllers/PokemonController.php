<?php

namespace Pokedex\Controllers;
use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class PokemonController extends MainController
{
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
        dump('je suis là');
        $data['pokemon'] = $pokemon;
        $data['listOfType'] = $listOfType;
        $this->show('detail', $data);
    }


}