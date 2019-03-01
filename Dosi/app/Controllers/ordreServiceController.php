<?php

namespace DOSI\CONTROLLERS;

use DOSI\LIB\inputFilter;
use DOSI\MODELS\ordreServiceModel;

class ordreServiceController extends abstractController
{
    use inputFilter;

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $os = new ordreServiceModel(
                $this->filterString($_POST['num']),
                $this->filterString($_POST['dateOS']),
                $this->filterString($_POST['typeOS']),
                $_POST['etape'],
                $this->filterString($_POST['remarque']),
                $this->_params[0]
            );
            if ($os->addAction()) {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'ajouté';
            } else {
                $_SESSION['message'] = 'confirmer votre information';
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $this->_data['ordreService'] = ordreServiceModel::getByPK($this->_params[0], $this->_params[1], $this->_params[2]);
        $this->_view();
        $this->_data = array();
        if (isset($_POST['submit'])) {
            $os = new ordreServiceModel(
                $this->filterString($_POST['num']),
                $this->filterString($_POST['dateOS']),
                $this->filterString($_POST['typeOS']),
                $_POST['etape'],
                $this->filterString($_POST['remarque']),
                $this->_params[0]
            );
            if ($os->editAction($this->_params[0], $this->_params[1], $this->_params[2])) {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'modifieé';
            } else {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'confirmer votre information';
            }
        }
    }

    public function deleteAction()
    {
        $id = $this->_params[0];
        if (ordreServiceModel::deleteAction($id, $this->_params[1], $this->_params[2])) {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'supprimer';
        } else {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'confirmer votre information';
        }
    }
}