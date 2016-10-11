<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Intervention
 *
 * @author kzexo
 */
require_once './1-Crud/_Intervention.php';

class InterventionController {

    //put your code here

    private $InterventionCrud;

    function __construct() {
        $this->InterventionCrud = new _Intervention();
    }

    public function getInterventionByID($id) {
        return $this->InterventionCrud->getInterventionByID($id);
    }

    public function getAllIntervention() {
        return $this->InterventionCrud->getAllInterventions();
    }
    
    public function addIntervention($InterventionObject){
        $this->InterventionCrud->addIntervention($InterventionObject);
    }
    public function updateIntervention($InterventionObject){
        $this->InterventionCrud->updateIntervention($InterventionObject);
    }
    
    public function deleteIntervention($ID){
        $this->InterventionCrud->deleteIntervention($ID);
    }

}

?>