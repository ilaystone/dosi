<?php

namespace DOSI\LIB;

class FrontController
{
    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();

    public function __construct()
    {
      $this->_parseUrl();
    }

    private  function _parseUrl()
    {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
        if (isset($url[0]) && $url[0] != '')
        {
            $this->_controller = $url[0];
        }
        if (isset($url[1]) && $url[1] != '')
        {
            $this->_action = $url[1];
        }
        if (isset($url[2]) && $url[2] != '')
        {
            $this->_params = explode('/', $url[2]);
        }
    }

    public function Dispatch()
    {
        $controllerClassName = 'DOSI\CONTROLLERS\\' . $this->_controller . 'controller';
        $action = $this->_action . 'Action';
        if (!class_exists($controllerClassName))
        {
            $controllerClassName = 'DOSI\CONTROLLERS\notFoundController';
            $this->_controller = 'notFound';
        }
        $controller =new $controllerClassName();
        if (!method_exists($controller, $action))
        {
            $action = 'notFoundAction';
        }
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->$action();
    }
}
