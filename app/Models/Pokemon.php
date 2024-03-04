<?php

namespace Pokedex\Models;
use Pokedex\Models\CoreModels;
use Pokedex\Models\type;
use Pokedex\Utils\Database;
use \PDO;

class Pokemon extends CoreModels
{
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;

    public function findAll()
    {
        $pdo = Database::getPDO();

		$sql = 'SELECT pokemon.* FROM pokemon';
		$pdoStatement = $pdo->query($sql);

		$results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

		return $results;

    }

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