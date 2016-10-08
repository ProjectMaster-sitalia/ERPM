<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeContactComponent
 *
 * @author user
 */
require_once './3-Controller/TypeContactController.php';
require_once './2-Model/TypeContact.php';
require_once './1-Crud/_TypeContact.php';

class TypeContactComponent {

    //put your code here

    private $TypeContactController;
    private $TypeContact;

    function __construct() {

        $this->TypeContactController = new TypeContactController();
        
    }

    public function getTypeContactTestVue($id) {

        $this->TypeContact = $this->TypeContactController->getTypeContactByID($id);
        if ($this->TypeContact) {
            var_dump($this->TypeContact);
            $ID = $this->TypeContact->getID();
            $libelle = $this->TypeContact->getLibelle();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$libelle</p>");
            return $output;
        }
        else
            return null;
    }

    public function setTypeContactController($TypeContactController) {
        $this->TypeContactController = $TypeContactController;
    }

}

?>
