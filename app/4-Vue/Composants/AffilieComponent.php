<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AffilieComponent
 *
 * @author kzexo
 */
require_once './3-Controller/AffilieController.php';
require_once './2-Model/Affilie.php';
require_once './1-Crud/_Affilie.php';

class AffilieComponent {

    //put your code here

    private $affilieController;
    private $affilie;

    function __construct() {

        $this->affilieController = new AffilieController();
        
    }

    public function getAffilierTestVue($id) {

        $this->affilie = $this->affilieController->getAffilieByID($id);
        if ($this->affilie) {
          //  var_dump($this->affilie);
            $ID = $this->affilie->getID();
            $adresseFacturation = $this->affilie->getAdresseFacturation();

            $output = ("<h1>$ID</h1>");
            $output.=("<p>$adresseFacturation</p>");
            return $output;
        }
        else
            return null;
    }

    public function setAffilieController($affilieController) {
        $this->affilieController = $affilieController;
    }

}

?>