<?php

namespace DOSI\CONTROLLERS;


use DOSI\LIB\inputFilter;
use DOSI\MODELS\indexModel;
use DOSI\MODELS\loginModel;

class loginController extends abstractController
{
    use inputFilter;

    public function defaultAction()
    {
        if (isset($_POST['submit'])) {
            $user = new loginModel();
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            if ($user->userExists()) {
                $_SESSION['loggedin'] = true;
                $_SESSION['tag'] = $user->tag;
                $_SESSION['name'] = $user->username;
                header('location: /index/default');
            } else
                echo 'user doesn\'t exist';
        }
        include_once VIEW_PATH . DS . 'login' . DS . 'prompt.view.php';
    }

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $user = new loginModel();
            $user->username = $this->filterString($_POST['name']);
            $user->password = $this->filterString($_POST['pass']);
            $user->tag = $this->filterString($_POST['tag']);
            if ($user->addAction()) {
                header('location: /index/default/');
                $_SESSION['message'] = 'ajoute reussie';
            } else {
                header('location: /index/default/');
                $_SESSION['message'] = 'confirmer votre information';
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $this->_data['users'] = loginModel::getByPK($this->_params[0]);
        $this->_view();
        $this->_data = array();
        if (isset($_POST['submit'])) {
            $user = new loginModel();
            $user->username = $this->filterString($_POST['name']);
            $user->password = $this->filterString($_POST['pass']);
            $user->tag = $this->filterString($_POST['tag']);
            if ($user->editAction($this->_params[0])) {
                header('location: /index/default/');
                $_SESSION['message'] = 'a été modifier';
            } else {
                header('location: /index/default/');
                $_SESSION['message'] = 'confirmer votre information';
            }
        }
    }

    public function deleteAction()
    {
        $id = $this->_params[0];
        if (loginModel::deleteAction($id)) {
            header('location: /index/default/');
            $_SESSION['message'] = 'supprimer';
        } else {
            header('location: /index/default/');
            $_SESSION['message'] = 'confirmer votre information';
        }
    }
}