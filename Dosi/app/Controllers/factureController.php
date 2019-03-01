<?php

namespace DOSI\CONTROLLERS;


use DOSI\LIB\inputFilter;
use DOSI\MODELS\factureModel;

class factureController extends abstractController
{
    use inputFilter;

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $facture = new factureModel();
            $facture->numMarche = $this->filterString($this->_params[0]);
            $facture->numFacture = $this->filterString($_POST['numFacture']);
            $facture->numPrix = $_POST['numPrix'];
            $facture->designation = $this->filterString($_POST['designation']);
            $facture->u = $this->filterString($_POST['unite']);
            $facture->qte = $_POST['qte'];
            $facture->percent = $this->filterFloat($_POST['percent']);
            $facture->puht = $this->filterFloat($_POST['puht']);
            $facture->mnt = $this->filterFloat($_POST['mnt']);
            if ($facture->addAction()) {
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
        $this->_data['factures'] = factureModel::getByPK($this->_params[0], $this->_params[1], $this->_params[2]);
        $this->_view();
        $this->_data = array();
        if (isset($_POST['submit'])) {
            $facture = new factureModel();
            $facture->numMarche = $this->filterString($this->_params[0]);
            $facture->numFacture = $this->filterString($_POST['numFacture']);
            $facture->numPrix = $_POST['numPrix'];
            $facture->designation = $this->filterString($_POST['designation']);
            $facture->u = $this->filterString($_POST['unite']);
            $facture->qte = $_POST['qte'];
            $facture->percent = $this->filterFloat($_POST['percent']);
            $facture->puht = $this->filterFloat($_POST['puht']);
            $facture->mnt = $this->filterFloat($_POST['mnt']);
            if ($facture->editAction($this->_params[0], $this->_params[1], $this->_params[2])) {
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
        if (factureModel::deleteAction($id, $this->_params[1], $this->_params[1])) {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'supprimer';
        } else {
            header('location: /info/default/' . $this->_params[0]);
            $_SESSION['message'] = 'confirmer votre information';
        }
    }
}