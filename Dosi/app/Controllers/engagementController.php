<?php

namespace DOSI\CONTROLLERS;

use DOSI\LIB\inputFilter;
use DOSI\MODELS\engagementModel;

class engagementController extends abstractController
{
    use inputFilter;

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $engagement = new engagementModel(
                $this->filterString($_POST['annee']),
                $this->filterString($_POST['rubrique']),
                $this->filterFloat($_POST['report']),
                $this->filterString($_POST['consolidation']),
                $this->filterFloat($_POST['ncp']),
                $this->filterFloat($_POST['tcp']),
                $this->filterFloat($_POST['ce']),
                $this->_params[0]
            );
            if ($engagement->addAction()) {
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
        $this->_data['engagement'] = engagementModel::getByPK($this->_params[0]);
        $this->_view();
        $this->_data = array();
        if (isset($_POST['submit'])) {
            $engagement = new engagementModel(
                $this->filterString($_POST['annee']),
                $this->filterString($_POST['rubrique']),
                $this->filterFloat($_POST['report']),
                $this->filterString($_POST['consolidation']),
                $this->filterFloat($_POST['ncp']),
                $this->filterFloat($_POST['tcp']),
                $this->filterFloat($_POST['ce']),
                $this->_params[0]
            );
            if ($engagement->editAction($this->_params[0], $this->_params[1])) {
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
        if (engagementModel::deleteAction($id, $this->_params[1])) {
            header('location: /index/default/' . $this->_params[0]);
            $_SESSION['message'] = 'supprimer';
        } else {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'confirmer votre information';
        }
    }
}