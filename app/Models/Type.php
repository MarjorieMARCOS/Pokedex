<?php

namespace Pokedex\Models;
use Pokedex\Models\CoreModels;
use Pokedex\Models\Pokemon;
use Pokedex\Utils\Database;
use \PDO;

class Type extends CoreModels
{
    private $color;


    public function findAllTypeOfPokemon ($id)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT type.* 
                FROM type 
                INNER JOIN pokemon_type 
                ON type.id = type_id
                INNER JOIN pokemon 
                ON pokemon.number = pokemon_number
                WHERE pokemon.id = :id';

        // exécuter notre requête    
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();

        if ($pdoStatement) {
            $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
            return $result;
        } else {
            return $result = []; 
        }

    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}