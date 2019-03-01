<?php

namespace DOSI\MODELS;

use DOSI\LIB\connection;

class engagementModel
{
    public $annee;
    public $rubrique;
    public $report;
    public $consolidation;
    public $ncp;
    public $tcp;
    public $ce;
    public $numMarche;

    public static $connection;
    public static $tableName = 'engagement';
    public static $tableSchema = array(
        'annee',
        'rubrique',
        'report',
        'consolidation',
        'ncp',
        'tcp',
        'ce',
        'numMarche'
    );

    public function __construct($annee, $rubrique, $report, $consolidation, $ncp, $tcp, $ce, $numMarche)
    {
        $this->annee = $annee;
        $this->rubrique = $rubrique;
        $this->report = $report;
        $this->consolidation = $consolidation;
        $this->ncp = $ncp;
        $this->tcp = $tcp;
        $this->ce = $ce;
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
                             rubrique = "' . $num . '"');
        foreach (self::$tableSchema as $name)
        {
            $stmt->bindParam(':' . $name, $this->$name);
        }
        return $stmt->execute();
    }

    public static function deleteAction($pk, $num)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('DELETE FROM ' . self::$tableName . ' WHERE numMarche=\'' . $pk . '\' AND rubrique = "' . $num . '"');
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
}