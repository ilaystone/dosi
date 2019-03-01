<?php

namespace DOSI\LIB;

class autoLoad
{
    public static function autoload($className)
    {
        $className = str_replace('DOSI', '', $className);
        $className = str_replace('\\', '/', $className);
        $className = strtolower($className);
        $className = $className . '.php';
        if (file_exists(APP_PATH . $className)) {
            require_once APP_PATH . $className;
        }
    }
}
spl_autoload_register(__NAMESPACE__ . '\autoLoad::autoload');