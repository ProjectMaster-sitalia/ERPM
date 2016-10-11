<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MagasinComponent
 *
 * @author kzexo
 */
require_once './3-Controller/MagasinController.php';
require_once './2-Model/Magasin.php';
require_once './1-Crud/_Magasin.php';

class MagasinComponent {

    //put your code here

    private $magasinController;
    private $magasin;

    function __construct() {

        $this->magasinController = new MagasinController();
        
    }

    public function getMagasinTestVue($id) {

        $this->magasin = $this->magasinController->getMagasinByID($id);
        if ($this->magasin) {
            var_dump($this->magasin);
            $ID = $this->magasin->getID();
            $adresseFacturation = $this->magasin->getAdresseFacturation();
            $adressePhysique = $this->magasin->getAdressePhysique();
            $compagnie = $this->magasin->getCompagnie();
            //Vue compagnie qui est un objet
            $compagnieCoponent = new CompagnieComponent();
            $outputCompagnie = $compagnieCoponent->getCompagnieTestVue($compagnie->getID());
            
            $output = ("<h1>ID Magasin : $ID</h1>");
            $output.=("<p>Adresse Facturation : $adresseFacturation</p>");
            $output.=("<p>Adresse Physique : $adressePhysique</p>");
            $output.=("<div style='margin-left:100px'>$outputCompagnie</div>");
            return $output;
        }
        else
            return null;
    }

    public function setMagasinController($magasinController) {
        $this->magasinController = $magasinController;
    }
    
        public function updateMagasinTestVue($ID,$adresseFacturation,$compagnieID,$adressePhysique){
       
        $magasinObject = new Magasin($ID);
        $magasinObject->setAdresseFacturation($adresseFacturation);
        $magasinObject->setCompagnie($compagnieID);
        $magasinObject->setAdressePhysique($adressePhysique);
        
        $this->magasinController->updateMagasin($magasinObject);
        
    } 
    
    public function addMagasinTestVue($ID,$adresseFacturation,$compagnieID,$adressePhysique){
       
        $magasinObject = new Magasin($ID);
        $magasinObject->setAdresseFacturation($adresseFacturation);
        $magasinObject->setCompagnie($compagnieID);
        $magasinObject->setAdressePhysique($adressePhysique);
        
        $this->magasinController->addMagasin($magasinObject);
        
        
    }

    public function deleteMagasinTestVue($ID){
        
        $this->magasinController->deleteMagasin($ID);
        
    }

}

?>