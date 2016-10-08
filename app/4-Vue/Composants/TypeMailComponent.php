<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeMailComponent
 *
 * @author user
 */
require_once './3-Controller/TypeMailController.php';
require_once './2-Model/TypeMail.php';
require_once './1-Crud/_TypeMail.php';

class TypeMailComponent {

    //put your code here

    private $TypeMailController;
    private $TypeMail;

    function __construct() {

        $this->TypeMailController = new TypeMailController();
        
    }

    public function getTypeMailTestVue($id) {

        $this->TypeMail = $this->TypeMailController->getTypeMailByID($id);
        if ($this->TypeMail) {
            var_dump($this->TypeMail);
            $ID = $this->TypeMail->getID();
            $libelle = $this->TypeMail->getLibelle();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$libelle</p>");
            return $output;
        }
        else
            return null;
    }

    public function setTypeMailController($TypeMailController) {
        $this->TypeMailController = $TypeMailController;
    }

}


?>
