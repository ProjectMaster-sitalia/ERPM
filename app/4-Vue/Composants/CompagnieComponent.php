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
            $manager = $this->compagnie->getManager();
            $libelle = $this->compagnie->getLibelle();
            $logo = $this->compagnie->getLogo();
            $adresseFacturation = $this->compagnie->getAdresseFacturation();
            
            $output = ("<h1>ID Compagnie : $ID</h1>");
            $output.=("<p>manager : $manager</p>");
            $output.=("<p>libelle : $libelle</p>");
            $output.=("<p>logo : $logo</p>");
            $output.=("<p>adresse facturation : $adresseFacturation</p>");
            return $output;
        }
        else
            return null;
    }

    public function setCompagnieController($compagnieController) {
        $this->compagnieController = $compagnieController;
    }
    
    public function addCompagnieTestVue($ID,$manager,$libelle,$logo,$adresseFacturation){
       
        $compagnieObject = new Compagnie($ID);
        $compagnieObject->setManager($manager);
        $compagnieObject->setLibelle($libelle);
        $compagnieObject->setLogo($logo);
        $compagnieObject->setAdresseFacturation($adresseFacturation);
        
        $this->compagnieController->addCompagnie($compagnieObject);
        
        
    }
    
    public function updateCompagnieTestVue($ID,$manager,$libelle,$logo,$adresseFacturation){
       
        $compagnieObject = new Compagnie($ID);
        $compagnieObject->setManager($manager);
        $compagnieObject->setLibelle($libelle);
        $compagnieObject->setLogo($logo);
        $compagnieObject->setAdresseFacturation($adresseFacturation);
        
        $this->compagnieController->updateCompagnie($compagnieObject);
        
        
    }
    
    
    public function deleteCompagnieTestVue($ID){
        
        $this->compagnieController->deleteCompagnie($ID);
        
    }

}

?>