<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InterventionComponent
 *
 * @author kzexo
 */
require_once './3-Controller/InterventionController.php';
require_once './2-Model/Intervention.php';
require_once './1-Crud/_Intervention.php';

class InterventionComponent {

    //put your code here

    private $InterventionController;
    private $Intervention;

    function __construct() {

        $this->InterventionController = new InterventionController();
    }

    public function getInterventionTestVue($id) {

        $this->Intervention = $this->InterventionController->getInterventionByID($id);
        if ($this->Intervention) {
            var_dump($this->Intervention);
            $ID = $this->Intervention->getID();
            $dateReception = $this->Intervention->getDateReception();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$dateReception</p>");
            return $output;
        }
        else
            return null;
    }

    public function setInterventionController($InterventionController) {
        $this->InterventionController = $InterventionController;
    }

}

?>