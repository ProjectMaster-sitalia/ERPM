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

    private $interventionController;
    private $intervention;

    function __construct() {

        $this->interventionController = new InterventionController();
    }

    public function getInterventionTestVue($id) {

        $this->intervention = $this->interventionController->getInterventionByID($id);
        if ($this->intervention) {
            var_dump($this->intervention);
            $ID = $this->intervention->getID();
            $dateReception = $this->intervention->getDateReception();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$dateReception</p>");
            return $output;
        }
        else
            return null;
    }

    public function setInterventionController($interventionController) {
        $this->interventionController = $interventionController;
    }
    
    public function updateInterventionTestVue(/*$ID,$newTypeCompte,$newUser,$newPassword*/){
       
//        $interventionObject = new Intervention($ID);
//        $interventionObject->setTypeCompte($newTypeCompte);
//        $interventionObject->setUser($newUser);
//        $interventionObject->setPassword($newPassword);
        
        $this->intervention = $this->interventionController->updateIntervention($interventionObject);
        
    }

    public function deleteInterventionTestVue($ID){
       
//        $interventionObject = new Intervention($ID);
//        $interventionObject->setTypeCompte($newTypeCompte);
//        $interventionObject->setUser($newUser);
//        $interventionObject->setPassword($newPassword);
        
        $this->intervention = $this->interventionController->deleteIntervention($ID);
        
    }

}

?>