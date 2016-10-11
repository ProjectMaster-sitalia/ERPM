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
            $dateIntervention = $this->intervention->getDateIntervention();
            
            $magasin = $this->intervention->getMagasin();
            //Vue magasin qui est un objet
            $magasinCoponent = new MagasinComponent();
            $outputMagasin = $magasinCoponent->getMagasinTestVue($magasin->getID());
            
            $team = $this->intervention->getTeam();
            //Vue team qui est un objet
            $teamCoponent = new TeamComponent();
            $outputTeam = $teamCoponent->getTeamTestVue($team->getID());
            
            $status = $this->intervention->getStatus();
            
            
            $output = ("<h1>ID Intervention : $ID</h1>");
            $output.=("<p>Date Reception  : $dateReception</p>");
            $output.=("<p>Date Intervention  : $dateIntervention</p>");
            $output.=("<p>Status Intervention  : $status</p>");
            $output.=("<div style='margin-left:100px'>$outputMagasin</div>");
            $output.=("<div style='margin-left:100px'>$outputTeam</div>");
//            $output.=$outputTeam;
            return $output;
        }
        else
            return null;
    }

    public function setInterventionController($interventionController) {
        $this->interventionController = $interventionController;
    }
    
    public function updateInterventionTestVue($ID,$dateReception,$dateIntervention,$magasinID,$teamID,$statusIntervention){

        $interventionObject = new Intervention($ID);
        $interventionObject->setDateReception($dateReception);
        $interventionObject->setDateIntervention($dateIntervention);
        $interventionObject->setMagasin($magasinID);
        $interventionObject->setTeam($teamID);
        $interventionObject->setStatus($statusIntervention);
        
        $this->interventionController->updateIntervention($interventionObject);
    
    }
    
    public function addInterventionTestVue($ID,$dateReception,$dateIntervention,$magasinID,$teamID,$statusIntervention){
       
        $interventionObject = new Intervention($ID);
        $interventionObject->setDateReception($dateReception);
        $interventionObject->setDateIntervention($dateIntervention);
        $interventionObject->setMagasin($magasinID);
        $interventionObject->setTeam($teamID);
        $interventionObject->setStatus($statusIntervention);
        
        $this->interventionController->addIntervention($interventionObject);
        
       
    }

    public function deleteInterventionTestVue($ID){
        
        $this->interventionController->deleteIntervention($ID);
        
    }

}

?>