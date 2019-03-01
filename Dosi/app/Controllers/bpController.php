<?php

namespace DOSI\CONTROLLERS;

use DOSI\LIB\inputFilter;
use DOSI\MODELS\bpModel;

class bpController extends abstractController
{
    use inputFilter;

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $bp = new bpModel(
                $_POST['numMission'],
                $this->filterString($_POST['designation']),
                $this->filterString($_POST['unite']),
                $this->filterFloat($_POST['prixUnitaire']),
                $this->filterFloat($_POST['prixTotal']),
                $_POST['delais'],
                $this->_params[0]
            );
            if ($bp->addAction()) {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'ajouté';
            } else {
                $_SESSION['message'] = 'information erroné';
                header('location: /info/default/' . $this->_params[0]);
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $this->_data['bordeau'] = bpModel::getByPK($this->_params[0], $this->_params[1]);
        $this->_view();
        $this->_data = array();
        if (isset($_POST['submit'])) {
            $bp = new bpModel(
                $_POST['numMission'],
                $this->filterString($_POST['designation']),
                $this->filterString($_POST['unite']),
                $this->filterFloat($_POST['prixUnitaire']),
                $this->filterFloat($_POST['prixTotal']),
                $_POST['delais'],
                $this->_params[0]
            );
            if ($bp->editAction($this->_params[0], $this->_params[1])) {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'modifieé';
            } else {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'information erroné';
            }
        }
    }

    public function deleteAction()
    {
        $id = $this->_params[0];
        if (bpModel::deleteAction($id, $this->_params[1])) {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'supprimer';
        } else {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'information erroné';
        }
    }
}
