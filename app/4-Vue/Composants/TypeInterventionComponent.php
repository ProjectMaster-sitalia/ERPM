<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeInterventionComponent
 *
 * @author user
 */
require_once './3-Controller/TypeInterventionController.php';
require_once './2-Model/TypeIntervention.php';
require_once './1-Crud/_TypeIntervention.php';

class TypeInterventionComponent {

    //put your code here

    private $TypeInterventionController;
    private $TypeIntervention;

    function __construct() {

        $this->TypeInterventionController = new TypeInterventionController();
        
    }

    public function getTypeInterventionTestVue($id) {

        $this->TypeIntervention = $this->TypeInterventionController->getTypeInterventionByID($id);
        if ($this->TypeIntervention) {
            var_dump($this->TypeIntervention);
            $ID = $this->TypeIntervention->getID();
            $libelle = $this->TypeIntervention->getLibelle();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$libelle</p>");
            return $output;
        }
        else
            return null;
    }

    public function setTypeInterventionController($TypeInterventionController) {
        $this->TypeInterventionController = $TypeInterventionController;
    }

}


?>
