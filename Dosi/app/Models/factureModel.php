<?php

namespace DOSI\MODELS;


use DOSI\LIB\connection;

class factureModel
{
    public $numMarche;
    public $numFacture;
    public $numPrix;
    public $designation;
    public $u;
    public $qte;
    public $percent;
    public $puht;
    public $mnt;

    public static $connection;
    public static $tableName = 'facture';
    public static $tableSchema = array(
        'numMarche',
        'numFacture',
        'numPrix',
        'designation',
        'u',
        'qte',
        'percent',
        'puht',
        'mnt'
    );

    public function __construct()
    {
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
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' WHERE numMarche = \'' . $numMarche . '\' ORDER BY numFacture,numPrix');
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

    public function editAction($pk, $np, $nf)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('UPDATE ' . self::$tableName . ' SET ' . $this->setStmt() . ' WHERE numMarche =\'' . $pk . '\' AND
                             numPrix = "' . $np . '" AND numFacture = "' . $nf . '"');
        foreach (self::$tableSchema as $name)
        {
            $stmt->bindParam(':' . $name, $this->$name);
        }
        return $stmt->execute();
    }

    public static function deleteAction($pk, $np, $nf)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('DELETE FROM ' . self::$tableName . ' WHERE numMarche=\'' . $pk . '\' AND numPrix = "' . $np . '" AND numFacture = "'
                                        . $nf . '"');
        return $stmt->execute();
    }

    public static function getByPK($pk, $np, $nf)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' where numMarche = "'. $pk . '" AND numPrix = "' . $np . '" AND numFacture = "'
                            . $nf . '"');
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        }
        else
            return false;
    }
}