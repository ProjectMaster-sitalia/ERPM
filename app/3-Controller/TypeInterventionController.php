<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeInterventionController
 *
 * @author user
 */
require_once './1-Crud/_TypeIntervention.php';

class TypeInterventionController {

    //put your code here

    private $TypeInterventionCrud;

    function __construct() {
        $this->TypeInterventionCrud = new _TypeIntervention();
    }

    public function getTypeInterventionByID($id) {
        return $this->TypeInterventionCrud->getTypeInterventionByID($id);
    }

    public function getAllTypeIntervention() {
        return $this->TypeInterventionCrud->getAllTypeIntervention();
    }

}


?>
