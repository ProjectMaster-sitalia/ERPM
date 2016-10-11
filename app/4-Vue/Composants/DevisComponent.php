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
            
            $intervention = $this->devis->getIntervention();
            $interventionComponent = new InterventionComponent();
            $outputIntervention = $interventionComponent->getInterventionTestVue($intervention->getID());

            //$artisan = $this->devis->getArtisan(); //on attend de ramener la bdd de mastore
            
            $output = ("<h1>Devis ID : $ID</h1>");
            $output.=("<p>$statusDevis</p>");
            $output.=("<div style='margin-left:100px;'>$outputIntervention</div>");

            return $output;
        }
        else
            return null;
    }

    public function setDevisController($devisController) {
        $this->devisController = $devisController;
    }
    
    public function addDevisTestVue($ID,$statusDevis,$interventionID,$artisanID){
       
        $devisObject = new Devis($ID);
        $devisObject->setStatusDevis($statusDevis);
        $devisObject->setIntervention($interventionID);
        $devisObject->setArtisan($artisanID);
        
        $this->devisController->addDevis($devisObject);
        
        
    }
    
    public function updateDevisTestVue($ID,$statusDevis,$interventionID,$artisanID){
       
        $devisObject = new Devis($ID);
        $devisObject->setStatusDevis($statusDevis);
        $devisObject->setIntervention($interventionID);
        $devisObject->setArtisan($artisanID);
        
        $this->devisController->updateDevis($devisObject);  
    }

    public function deleteDevisTestVue($ID){
        
        $this->devisController->deleteDevis($ID);
        
    }
}
?>
