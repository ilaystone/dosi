<?php

namespace DOSI\MODELS;

use DOSI\LIB\connection;
use http\Client\Curl\User;

class loginModel
{
    public $username;
    public $password;
    public $tag = '';

    public static $connection;
    public static $tableName = 'user';
    public static $tableSchema = array(
        'username',
        'password',
        'tag'
    );

    public function __construct()
    {
    }

    public function userExists()
    {
        $data = self::getByPK($this->username);
        if (!empty($data))
        {
            if ($data[0]->password == $this->password)
            {
                $this->tag = $data[0]->tag;
                $this->responsablite = $data[0]->responsablite;
                return true;
            }
        }
        return false;
    }

    public static function getByPK($pk)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('SELECT * FROM ' . self::$tableName . ' where username = "'. $pk . '"');
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(self::$tableSchema));
        }
        else
            return false;
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
        $stmt = self::$connection->prepare('UPDATE ' . self::$tableName . ' SET ' . $this->setStmt() . ' WHERE username =\'' . $pk . '\'');
        foreach (self::$tableSchema as $name)
        {
            $stmt->bindParam(':' . $name, $this->$name);
        }
        return $stmt->execute();
    }

    public static function deleteAction($pk)
    {
        self::$connection = connection::init();
        $stmt = self::$connection->prepare('DELETE FROM ' . self::$tableName . ' WHERE username=\'' . $pk . '\'');
        return $stmt->execute();
    }
}