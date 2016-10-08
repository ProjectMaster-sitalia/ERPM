<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DevisComponent
 *
 * @author user
 */
require_once './3-Controller/DevisController.php';
require_once './2-Model/Devis.php';
require_once './1-Crud/_Devis.php';

class DevisComponent {

    //put your code here

    private $devisController;
    private $devis;

    function __construct() {

        $this->devisController = new DevisController();
        
    }

    public function getDevisTestVue($id) {

        $this->devis = $this->devisController->getDevisByID($id);
        if ($this->devis) {
            var_dump($this->devis);
            $ID = $this->devis->getID();
            $statusDevis = $this->devis->getStatusDevis();
            $InterventionID = $this->devis->getInterventionID();
            $artisanID = $this->devis->getArtisanID();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$statusDevis</p>");
            $output.=("<p>$InterventionID</p>");
            $output.=("<p>$artisanID</p>");
            return $output;
        }
        else
            return null;
    }

    public function setDevisController($devisController) {
        $this->devisController = $devisController;
    }
    
    public function updateDevisTestVue($ID,$statusDevisUpdated,$interventionIDUpdated,$artisanIDUpdated){
       
        $devisObject = new Devis($ID);
        $devisObject->setStatusDevis($statusDevisUpdated);
        $devisObject->setInterventionID($interventionIDUpdated);
        $devisObject->setArtisanID($artisanIDUpdated);
        
        $this->devis = $this->devisController->updateDevis($devisObject);
        
        
    }

}
?>
