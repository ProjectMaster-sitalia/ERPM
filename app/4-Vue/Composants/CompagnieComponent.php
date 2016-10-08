<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompagnieComponent
 *
 * @author kzexo
 */
require_once './3-Controller/CompagnieController.php';
require_once './2-Model/Compagnie.php';
require_once './1-Crud/_Compagnie.php';

class CompagnieComponent {

    //put your code here

    private $compagnieController;
    private $compagnie;

    function __construct() {

        $this->compagnieController = new CompagnieController();
        
    }

    public function getCompagnieTestVue($id) {

        $this->compagnie = $this->compagnieController->getCompagnieByID($id);
        if ($this->compagnie) {
            var_dump($this->compagnie);
            $ID = $this->compagnie->getID();
            $adresseFacturation = $this->compagnie->getAdresseFacturation();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$adresseFacturation</p>");
            return $output;
        }
        else
            return null;
    }

    public function setCompagnieController($compagnieController) {
        $this->compagnieController = $compagnieController;
    }
    
    public function updateCompagnieTestVue($ID,$manager,$libelle,$logo,$adresseFacturation){
       
        $compagnieObject = new Compagnie($ID);
        $compagnieObject->setManager($manager);
        $compagnieObject->setLibelle($libelle);
        $compagnieObject->setLogo($logo);
        $compagnieObject->setAdresseFacturation($adresseFacturation);
        
        $this->compagnie = $this->compagnieController->updateCompagnie($compagnieObject);
        
        
    }

}

?>