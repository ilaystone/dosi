<?php

namespace DOSI\CONTROLLERS;

use DOSI\LIB\inputFilter;
use DOSI\MODELS\indexModel;
use DOSI\MODELS\loginModel;

class indexController extends abstractController
{
    use inputFilter;

    public function defaultAction()
    {
        if (isset($_POST['submit'])) {
            $_SESSION['loggedin'] = false;
            header('location:/index/default');
        } else {
            $this->_data['markets'] = $this->displayByTag($_SESSION['tag'], $_SESSION['name']);
            $this->_data['users'] = loginModel::getAll();
            $this->_view();
        }
    }

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $marche = new indexModel($this->filterString($_POST['marche']),
                $this->filterString($_POST['responsable']),
                $this->filterString($_POST['devision']),
                $this->filterString($_POST['service'])
            );
            if ($marche->addAction()) {
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
        $this->_data['info'] = indexModel::getByPK($this->_params[0]);
        $this->_view();
        $this->_data = array();
        if (isset($_POST['submit'])) {
            $marche = new indexModel($this->filterString($_POST['marche']),
                $this->filterString($_POST['responsable']),
                $this->filterString($_POST['devision']),
                $this->filterString($_POST['service'])
            );
            if ($marche->editAction($this->_params[0])) {
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
        if (indexModel::deleteAction($id)) {
            header('location: /index/default/');
            $_SESSION['message'] = 'supprimer';
        } else {
            header('location: /index/default/');
            $_SESSION['message'] = 'confirmer votre information';
        }
    }

    private function displayByTag($tag, $name)
    {
        switch ($tag) {
            case 0:
                return indexModel::getAll();
                break;
            case 1:
                return indexModel::getByDivision($name);
                break;
            case 2:
                return indexModel::getByService($name);
                break;
            case 3:
                return indexModel::getByResponsable($name);
                break;
            default :
                break;
        }
    }
}
