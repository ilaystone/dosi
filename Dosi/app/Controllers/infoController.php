<?php

namespace DOSI\CONTROLLERS;

use DOSI\LIB\inputFilter;
use DOSI\MODELS\bpModel;
use DOSI\MODELS\emissionModel;
use DOSI\MODELS\engagementModel;
use DOSI\MODELS\factureModel;
use DOSI\MODELS\infoModel;
use DOSI\MODELS\ordreServiceModel;

class infoController extends abstractController
{
    use inputFilter;

    public function defaultAction()
    {
        include_once VIEW_PATH . DS . 'List.php';
        $this->_data['info'] = infoModel::getByPK($this->_params[0]);
        $this->_view();
        $this->_data['emission'] = emissionModel::getAll($this->_params[0]);
        extract($this->_data);
        include_once VIEW_PATH . DS . 'emission' . DS . 'default.view.php';
        $this->_data['factures'] = factureModel::getAll($this->_params[0]);
        extract($this->_data);
        include_once VIEW_PATH . DS . 'facture' . DS . 'default.view.php';
        $this->_data['engagement'] = engagementModel::getAll($this->_params[0]);
        extract($this->_data);
        include_once VIEW_PATH . DS . 'engagement' . DS . 'default.view.php';
        $this->_data['ordreService'] = ordreServiceModel::getAll($this->_params[0]);
        extract($this->_data);
        include_once VIEW_PATH . DS . 'ordreService' . DS . 'default.view.php';
        $this->_data['bp'] = bpModel::getAll($this->_params[0]);
        extract($this->_data);
        include_once VIEW_PATH . DS . 'bp' . DS . 'default.view.php';
        $this->_data = array();
    }

    public function editAction()
    {
        $this->_data['info'] = infoModel::getByPK($this->_params[0]);
        $this->_view();
        if (isset($_POST['submit'])) {
            $market = new infoModel($this->filterString($_POST['OBJET']),
                $this->filterString($_POST['Responsable']),
                $this->filterString($_POST['AO']),
                $this->filterString($_POST['Marche']),
                $this->filterString($_POST['Attributaire']),
                $this->filterString($_POST['Dateou']),
                $this->filterString($_POST['Dateap']),
                $this->filterString($_POST['Approuve']),
                $this->filterString($_POST['Situation']),
                $this->filterFloat($_POST['Montantht']));
            if ($market->editAction($_POST['Marche'])) {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'modifieé';
            } else {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'confirmer votre information';
            }
        }
    }

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $market = new infoModel($this->filterString($_POST['OBJET']),
                $this->filterString($_POST['Responsable']),
                $this->filterString($_POST['AO']),
                $this->filterString($_POST['Marche']),
                $this->filterString($_POST['Attributaire']),
                $this->filterString($_POST['Dateou']),
                $this->filterString($_POST['Dateap']),
                $this->filterString($_POST['Approuve']),
                $this->filterString($_POST['Situation']),
                $this->filterFloat($_POST['Montantht']));
            if ($market->addAction()) {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'ajouté';
            } else {
                header('location: /info/default/' . $this->_params[0]);
                $_SESSION['message'] = 'confirmer votre information';
            }
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->_params[0];
        if (infoModel::deleteAction($id)) {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'supprimer';
        } else {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'confirmer votre information';
        }
    }
}
