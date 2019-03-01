<?php

namespace DOSI\MODELS;

use DOSI\LIB\connection;

class ordreServiceModel
{
    public $num;
    public $dateOS;
    public $typeOS;
    public $etape;
    public $remarque;
    public $numMarche;

    public static $connection;
    public static $tableName = 'ordreService';
    public static $tableSchema = array(
        'num',
        'dateOS',
        'typeOS',
        'etape',
        'remarque',
        'numMarche'
    );

    public function __construct($num, $dateOS, $typeOS, $etape, $remarque, $numMarche)
    {
        $this->num = $num;
        $this->dateOS = $dateOS;
        $this->typeOS = $typeOS;
        $this->etape = $etape;
        $this->remarque = $remarque;
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
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' WHERE numMarche = \'' . $numMarche . '\' ORDER BY etape, num');
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

    public function editAction($pk, $etape, $num)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('UPDATE ' . self::$tableName . ' SET ' . $this->setStmt() . ' WHERE numMarche =\'' . $pk . '\' AND 
                       etape = "' . $etape . '" AND num = "' . $num . '"');
        foreach (self::$tableSchema as $name)
        {
            $stmt->bindParam(':' . $name, $this->$name);
        }
        return $stmt->execute();
    }

    public static function deleteAction($pk, $etape, $num)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('DELETE FROM ' . self::$tableName . ' WHERE numMarche =\'' . $pk . '\' AND etape = "' . $etape . '" AND num = "' . $num . '"');
        return $stmt->execute();
    }

    public static function getByPK($pk, $etape,  $num)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' WHERE numMarche =\'' . $pk . '\' AND 
                       etape = "' . $etape . '" AND num = "' . $num . '"');
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        }
        else
            return false;
    }
}