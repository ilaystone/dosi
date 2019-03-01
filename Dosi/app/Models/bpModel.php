<?php

namespace DOSI\MODELS;

use DOSI\LIB\connection;

class bpModel
{
    public $numMission;
    public $designation;
    public $unite;
    public $prixUnitaire;
    public $prixTotal;
    public $delais;
    public $numMarche;

    public static $connection;
    public static $tableName = 'bp';
    public static $tableSchema = array(
      'numMission',
        'designation',
        'unite',
        'prixUnitaire',
        'prixTotal',
        'delais',
        'numMarche'
    );

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

    public function __construct($numMission, $designation, $unite, $prixUnitaire, $prixTotal, $delais, $numMarche)
    {
        $this->numMission = $numMission;
        $this->designation = $designation;
        $this->numMarche = $numMarche;
        $this->unite = $unite;
        $this->prixUnitaire = $prixUnitaire;
        $this->prixTotal = $prixTotal;
        $this->delais = $delais;

    }

    public static function getAll($numMarche)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' WHERE numMarche = \'' . $numMarche . '\'');
        if ($stmt->execute()) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        } else {
            return false;
        }
    }

    public function addAction()
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('INSERT INTO ' . self::$tableName . ' SET ' . $this->setStmt());

        foreach (self::$tableSchema as $name)
        {
            $stmt->bindParam(':' . $name, $this->$name);
        }
        return $stmt->execute();
    }

    public function editAction($pk, $num)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('UPDATE ' . self::$tableName . ' SET ' . $this->setStmt() . ' WHERE numMarche =\'' . $pk . '\' AND 
                        numMission = \'' . $num . '\'');
        foreach (self::$tableSchema as $name)
        {
            $stmt->bindParam(':' . $name, $this->$name);
        }
        return $stmt->execute();
    }

    public static function deleteAction($pk, $num)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('DELETE FROM ' . self::$tableName . ' WHERE numMarche=\'' . $pk . '\' AND numMission = \'' . $num . '\'');
        return $stmt->execute();
    }

    public static function getByPK($pk, $num)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' where numMarche = "'. $pk . '" AND numMission = "' . $num . '"');
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        }
        else
            return false;
    }
}