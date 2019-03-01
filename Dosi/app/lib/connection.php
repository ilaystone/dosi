<?php

namespace DOSI\LIB;


class connection
{
    public static function init()
    {
        return new \PDO("mysql:host=" . DB_HOST_NAME . ";dbname=" . DATA_BASE_NAME , DB_USER_NAME, DB_USER_PASS);
    }
}