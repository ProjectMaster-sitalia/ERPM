<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DevisLineComponent
 *
 * @author user
 */
require_once './3-Controller/DevisLineController.php';
require_once './2-Model/DevisLine.php';
require_once './1-Crud/_DevisLine.php';

class DevisLineComponent {

    //put your code here

    private $devisLineController;
    private $devisLine;

    function __construct() {

        $this->devisLineController = new DevisLineController();
        
    }

    public function getDevisLineTestVue($id) {

        $this->devisLine = $this->devisLineController->getDevisLineByID($id);
        if ($this->devisLine) {
            var_dump($this->devisLine);
            $ID = $this->devisLine->getID();
            $description = $this->devisLine->getDescription();
            $unite = $this->devisLine->getUnite();
            $prixUnitaire = $this->devisLine->getPrixUnitaire();
            $quantite = $this->devisLine->getQuantite();
            $prixHT = $this->devisLine->getPrixHT();
            
            $devis = $this->devisLine->getDevis();
            
            $typeIntervention = $this->devisLine->getTypeIntervention();
            
            
            $output = ("<h1>ID DevisLine : $ID</h1>");
            $output.=("<p>unite: $unite</p>");
            $output.=("<p>Description : $description</p>");
            $output.=("<p>Prix unitaire : $prixUnitaire</p>");
            $output.=("<p>Quantite : $quantite</p>");
            $output.=("<p>Prix HT : $prixHT</p>");

            return $output;
        }
        else
            return null;
    }

    public function setDevisLineController($devisLineController) {
        $this->devisLineController = $devisLineController;
    }
    
    public function updateDevisLineTestVue($ID,$devisId,$description,$unite,$prixUnitaire,$quantite,$prixHT,$typeInterventionID){
       
        $DevisLineObject = new DevisLine($ID);
        $DevisLineObject->setDevisID($devisId);
        $DevisLineObject->setDescription($description);
        $DevisLineObject->setUnite($unite);
        $DevisLineObject->setPrixUnitaire($prixUnitaire);
        $DevisLineObject->setQuantite($quantite);
        $DevisLineObject->setPrixHT($prixHT);
        $DevisLineObject->setTypeInterventionID($typeInterventionID);
        
        $this->devisLineController->updateDevisLine($DevisLineObject);
        
    }




    public function addDevisLineTestVue($ID,$devisId,$description,$unite,$prixUnitaire,$quantite,$prixHT,$typeInterventionID){
       
        $DevisLineObject = new DevisLine($ID);
        $DevisLineObject->setDevisID($devisId);
        $DevisLineObject->setDescription($description);
        $DevisLineObject->setUnite($unite);
        $DevisLineObject->setPrixUnitaire($prixUnitaire);
        $DevisLineObject->setQuantite($quantite);
        $DevisLineObject->setPrixHT($prixHT);
        $DevisLineObject->setTypeInterventionID($typeInterventionID);
        
        $this->devisLineController->addDevisLine($DevisLineObject);
        
    }
    
}
?>
