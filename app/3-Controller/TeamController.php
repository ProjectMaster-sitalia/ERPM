<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Team
 *
 * @author kzexo
 */
require_once './1-Crud/_Team.php';

class TeamController {

    //put your code here

    private $TeamCrud;

    function __construct() {
        $this->TeamCrud = new _Team();
    }

    public function getTeamByID($id) {
        return $this->TeamCrud->getTeamByID($id);
    }

    public function getAllTeam() {
        return $this->TeamCrud->getAllTeam();
    }
    
    public function updateTeam($TeamObject){
        $this->TeamCrud->updateTeam($TeamObject);
    }
    
    public function addTeam($teamObject){
        $this->TeamCrud->addTeam($teamObject);
    }
    
    public function deleteTeam($ID){
        $this->TeamCrud->deleteTeam($ID);
    }

}

?>