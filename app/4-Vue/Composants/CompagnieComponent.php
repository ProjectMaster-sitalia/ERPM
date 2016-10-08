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

    private $CompagnieController;
    private $Compagnie;

    function __construct() {

        $this->CompagnieController = new CompagnieController();
        
    }

    public function getCompagnieTestVue($id) {

        $this->Compagnie = $this->CompagnieController->getCompagnieByID($id);
        if ($this->Compagnie) {
            var_dump($this->Compagnie);
            $ID = $this->Compagnie->getID();
            $adresseFacturation = $this->Compagnie->getAdresseFacturation();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$adresseFacturation</p>");
            return $output;
        }
        else
            return null;
    }

    public function setCompagnieController($CompagnieController) {
        $this->CompagnieController = $CompagnieController;
    }

}

?>