<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeCompteComponent
 *
 * @author user
 */
require_once './3-Controller/TypeCompteController.php';
require_once './2-Model/TypeCompte.php';
require_once './1-Crud/_TypeCompte.php';

class TypeCompteComponent {

    //put your code here

    private $TypeCompteController;
    private $TypeCompte;

    function __construct() {

        $this->TypeCompteController = new TypeCompteController();
        
    }

    public function getTypeCompteTestVue($id) {

        $this->TypeCompte = $this->TypeCompteController->getTypeCompteByID($id);
        if ($this->TypeCompte) {
            var_dump($this->TypeCompte);
            $ID = $this->TypeCompte->getID();
            $libelle = $this->TypeCompte->getLibelle();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$libelle</p>");
            return $output;
        }
        else
            return null;
    }

    public function setTypeCompteController($TypeCompteController) {
        $this->TypeCompteController = $TypeCompteController;
    }

}

?>
