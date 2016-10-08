<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacturationArtisanComponent
 *
 * @author kzexo
 */
require_once './3-Controller/FacturationArtisanController.php';
require_once './2-Model/FacturationArtisan.php';
require_once './1-Crud/_FacturationArtisan.php';

class FacturationArtisanComponent {

    //put your code here

    private $FacturationArtisanController;
    private $FacturationArtisan;

    function __construct() {

        $this->FacturationArtisanController = new FacturationArtisanController();
        
    }

    public function getFacturationArtisanestVue($interventionID, $artisanID) {

        $this->FacturationArtisan = $this->FacturationArtisanController->getFacturationArtisanByID($interventionID, $artisanID);
        if ($this->FacturationArtisan) {
            var_dump($this->FacturationArtisan);
            $ID = $this->FacturationArtisan->getArtisanID();
            $accompte = $this->FacturationArtisan->getAccompte();

            $output = ("<h1>$ID</h1>");
            $output.=("<p>$accompte</p>");
            return $output;
        }
        else
            return null;
    }

    public function setFacturationArtisanController($FacturationArtisanController) {
        $this->FacturationArtisanController = $FacturationArtisanController;
    }

}

?>