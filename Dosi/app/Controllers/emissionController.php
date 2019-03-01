<?php

namespace DOSI\CONTROLLERS;

use DOSI\LIB\inputFilter;
use DOSI\MODELS\emissionModel;

class emissionController extends abstractController
{
    use inputFilter;

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $emmision = new emissionModel(
                $_POST['numDecompte'],
                $this->filterFloat($_POST['mntAcompte']),
                $this->filterFloat($_POST['mntRetenue']),
                $this->filterString($_POST['dateEnvoye']),
                $this->filterFloat($_POST['cumulePaiment']),
                $this->filterString($_POST['observation']),
                $this->_params[0]
            );
            if ($emmision->addAction()) {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'ajouté';
            } else {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'confirmer votre information';
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $this->_data['emission'] = emissionModel::getByPK($this->_params[0], $this->_params[1]);
        $this->_view();
        $this->_data = array();
        if (isset($_POST['submit'])) {
            $emmision = new emissionModel(
                $_POST['numDecompte'],
                $this->filterFloat($_POST['mntAcompte']),
                $this->filterFloat($_POST['mntRetenue']),
                $this->filterString($_POST['dateEnvoye']),
                $this->filterFloat($_POST['cumulePaiment']),
                $this->filterString($_POST['observation']),
                $this->_params[0]
            );
            if ($emmision->editAction($this->_params[0], $this->_params[1])) {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'modifieé';
            }
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->_params[0];
        if (emissionModel::deleteAction($id, $this->_params[1])) {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'supprimer';
        } else {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'confirmer votre information';
        }
    }
}