<?php

namespace Pokedex\Models;
use Pokedex\Models\CoreModels;
use Pokedex\Models\type;
use Pokedex\Utils\Database;
use \PDO;



/***
 * Classe Pokemon qui va gérer les requetes sql de la BBD Pokemon
 * 
 * 
 */
class Pokemon extends CoreModels
{
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;


    /***
     * Fonction qui va aller chercher tous les pokemon dans la base de données
     * 
     * 
     */
    public function findAll()
    {
        $pdo = Database::getPDO();

		$sql = 'SELECT pokemon.* FROM pokemon';
		$pdoStatement = $pdo->query($sql);

		$results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

		return $results;

    }


    /***
     * Fonction qui va aller chercher un pokemon dans la base de données
     * 
     * 
     */
    public function find($id)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT * FROM `pokemon` WHERE `id` = :id';

        // exécuter notre requête
        $pdoStatement = $pdo->prepare($sql);

        // un seul résultat => fetchObject
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return  $result;

    }


    /***
     * Fonction qui va aller chercher tous les pokemon d'un type dans la BDD
     * 
     * 
     */
    public function findAllPokemonByType ($id)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT pokemon.* 
                FROM pokemon 
                INNER JOIN pokemon_type 
                ON pokemon_number = pokemon.number
                INNER JOIN type 
                ON type.id = type_id
                WHERE type.id = :id';

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

    public function getHp()
    {
        return $this->hp;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    public function getSpe_attack()
    {
        return $this->spe_attack;
    }

    public function setSpe_attack($spe_attack)
    {
        $this->spe_attack = $spe_attack;

        return $this;
    }

    public function getSpe_defense()
    {
        return $this->spe_defense;
    }

    public function setSpe_defense($spe_defense)
    {
        $this->spe_defense = $spe_defense;

        return $this;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
}