<?php

namespace Pokedex\Models;
use Pokedex\Models\CoreModels;
use Pokedex\Models\Pokemon;
use Pokedex\Utils\Database;
use \PDO;


/***
 * Classe Type qui va gérer les requetes sql de la BBD Type
 * 
 * 
 */
class Type extends CoreModels
{
    private $color;

    /***
     * Fonction qui va aller chercher tous les type d'un pokemon dans la base de données
     * 
     * 
     */
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


    /***
     * Fonction qui va aller chercher tous les type dans la base de données
     * 
     * 
     */
    public function findAll ()
    {
        $pdo = Database::getPDO();

		$sql = 'SELECT type.* FROM type';
		$pdoStatement = $pdo->query($sql);

		$results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

		return $results;

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