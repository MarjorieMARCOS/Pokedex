<?php

namespace Pokedex\Models;
use Pokedex\Models\Pokemon;
use Pokedex\Models\type;


/***
 * Classe qui est parent des classes Pokemon et Type Model
 * 
 * 
 */
class CoreModels 
{
    protected $id;
    protected $name;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}