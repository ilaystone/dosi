<?php

namespace DOSI\MODELS;

use DOSI\LIB\connection;

class emissionModel
{
    public $numDecompte;
    public $mntAcompte;
    public $mntRetenue;
    public $dateEnvoye;
    public $cumulePaiment;
    public $observation;
    public $numMarche;

    public static $connection;
    public static $tableName = 'emission';
    public static $tableSchema = array(
        'numDecompte',
        'mntAcompte',
        'mntRetenue',
        'dateEnvoye',
        'cumulePaiment',
        'observation',
        'numMarche'
    );

    public function __construct($numDecompte, $mntAcompte, $mntRetenue, $dateEnvoye, $cumulePaiment, $observation, $numMarche)
    {
        $this->numDecompte = $numDecompte;
        $this->mntAcompte = $mntAcompte;
        $this->mntRetenue = $mntRetenue;
        $this->dateEnvoye = $dateEnvoye;
        $this->cumulePaiment = $cumulePaiment;
        $this->observation = $observation;
        $this->numMarche = $numMarche;
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
        $stmt = self::$connection->prepare('INSERT INTO ' . self::$tableName . ' set ' . $this->setStmt());
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
                        numDecompte = \'' . $num . '\'');
        foreach (self::$tableSchema as $name)
        {
            $stmt->bindParam(':' . $name, $this->$name);
        }
        return $stmt->execute();
    }

    public static function deleteAction($pk, $num)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('DELETE FROM ' . self::$tableName . ' WHERE numMarche=\'' . $pk . '\' AND numDecompte = \'' . $num . '\'');
        return $stmt->execute();
    }

    public static function getByPK($pk, $num)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' where numMarche = "'. $pk . '" AND numDecompte = "' . $num . '"');
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        }
        else
            return false;
    }
}