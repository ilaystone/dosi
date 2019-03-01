<?php

namespace DOSI\MODELS;

use DOSI\LIB\connection;

class infoModel
{
    public $object;
    public $responsable;
    public $aon;
    public $numMarche;
    public $attributaire;
    public $dateOuverture;
    public $dateAprobation;
    public $approuvePar;
    public $situation;
    public $montantHT;

    public static $connection;
    public static $tableName = 'info';
    public static $tableSchema = array(
        'object',
        'responsable',
        'aon',
        'numMarche',
        'attributaire',
        'dateOuverture',
        'dateAprobation',
        'approuvePar',
        'situation',
        'montantHT'
    );

    public function __construct($object, $responsable, $aon, $numMarche, $attributaire, $dateOuverture, $dateAprobation,
                                    $approuvePar, $situation, $montantHT)
    {
        $this->object = $object;
        $this->responsable = $responsable;
        $this->aon = $aon;
        $this->numMarche = $numMarche;
        $this->attributaire = $attributaire;
        $this->dateOuverture = $dateOuverture;
        $this->dateAprobation = $dateAprobation;
        $this->approuvePar = $approuvePar;
        $this->situation = $situation;
        $this->montantHT = $montantHT;
    }

    private function setStmt()
    {
        $stmt = '';
        foreach (self::$tableSchema as $name)
        {
            $stmt .= $name . ' = :' . $name . ', ';
        }
        $stmt = trim($stmt, ', ');
        return $stmt;
    }

    public function addAction()
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('INSERT INTO ' . self::$tableName . ' set ' . $this->setStmt());

        foreach (self::$tableSchema as $name)
        {
            $stmt->bindParam(':' . $name, $this->$name);
        }
        return $stmt->execute();
    }

    public function editAction($pk)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('UPDATE ' . self::$tableName . ' SET ' . $this->setStmt() . ' WHERE numMarche =\'' . $pk . '\'');
        foreach (self::$tableSchema as $name)
        {
            $stmt->bindParam(':' . $name, $this->$name);
        }
        return $stmt->execute();
    }

    public static function deleteAction($pk)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('DELETE FROM ' . self::$tableName . ' WHERE numMarche=\'' . $pk . '\'');
        return $stmt->execute();
    }

    public static function getAll()
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM marche');
        if ($stmt->execute()) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        } else {
            return false;
        }
    }

    public static function getByPK($pk)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' where numMarche = "'. $pk . '"');
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        }
        else
            return false;
    }
}