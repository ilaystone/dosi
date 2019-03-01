<?php

namespace DOSI\CONTROLLERS;

abstract class abstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_data = [];

    public function notFoundAction()
    {
        $this->_view();
    }

    public function setController($Controller)
    {
        $this->_controller = $Controller;
    }

    public function setAction($action)
    {
        $this->_action = $action;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    protected function _view()
    {
        if ($this->_action == 'notFoundAction')
        {
            require_once VIEW_PATH . 'notfound' . DS . $this->_action . '.view.php';
        }
        else
        {
            $view = VIEW_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if (file_exists($view))
            {
                extract($this->_data);
                require_once $view;
            }
            else
                require_once VIEW_PATH . 'notfound' . DS . 'anf.view.php';
        }
    }
}