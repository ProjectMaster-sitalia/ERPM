<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TeamComponent
 *
 * @author kzexo
 */
require_once './3-Controller/TeamController.php';
require_once './2-Model/Team.php';
require_once './1-Crud/_Team.php';

class teamComponent {

    //put your code here

    private $teamController;
    private $team;

    function __construct() {

        $this->teamController = new TeamController();
        
    }

    public function getTeamTestVue($id) {

        $this->team = $this->teamController->getTeamByID($id);
        if ($this->team) {
            var_dump($this->team);
            $ID = $this->team->getID();
            $user = $this->team->getUser();
            $password = $this->team->getPassword();
            $typeCompte = $this->team->getTypeCompte();
            $libelle = $typeCompte->getLibelle();
            
            $output = ("<h1>ID Team : $ID</h1>");
            $output.=("<p>Login : $user</p>");
            $output.=("<p>Password : $password</p>");
            $output.=("<p>Type de compte : $libelle</p>");

            return $output;
        }
        else
            return null;
    }

    public function setTeamController($teamController) {
        $this->teamController = $teamController;
    }
    
    public function updateTeamTestVue($ID,$newTypeCompte,$newUser,$newPassword){
       
        $TeamObject = new Team($ID);
        $TeamObject->setTypeCompte($newTypeCompte);
        $TeamObject->setUser($newUser);
        $TeamObject->setPassword($newPassword);
        
        $this->team = $this->teamController->updateTeam($TeamObject);
        
    }

}

?>