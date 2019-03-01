<?php

namespace DOSI;

use DOSI\CONTROLLERS\loginController;
use DOSI\LIB\FrontController;

session_start();
require_once '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'config.php';

try
{
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
    {
        $o = new loginController();
        $o->defaultAction();
    }
    else
    {
        $o = new FrontController();
        $o->Dispatch();
    }
}
catch (\Exception $e)
{
    die($e->getMessage());
}