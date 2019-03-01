<?php

namespace DOSI\MODELS;
use DOSI\LIB\connection;

class indexModel
{
    public $numMarche;
    public $responsable;
    public $division;
    public $service;

    public static $connection;
    public static $tableName = 'marche';
    public static $tableSchema = array(
      'numMarche',
      'responsable',
      'division',
      'service'
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

    public function __construct($numMarche, $responsable, $division, $service)
    {
        $this->numMarche = $numMarche;
        $this->responsable = $responsable;
        $this->division = $division;
        $this->service = $service;
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

    public static function getAll()
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName);
        if ($stmt->execute()) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        } else {
            return false;
        }
    }

    public  function editAction($pk)
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

    public static function getByResponsable($pk)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' where responsable = "'. $pk . '"');
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        }
        else
            return false;
    }

    public static function getByDivision($pk)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' where division = "'. $pk . '"');
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        }
        else
            return false;
    }

    public static function getByService($pk)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' where service = "'. $pk . '"');
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        }
        else
            return false;
    }
}