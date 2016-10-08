<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacturationArtisan
 *
 * @author kzexo
 */
require_once './1-Crud/_FacturationArtisan.php';

class FacturationArtisanController {

    //put your code here

    private $FacturationArtisanCrud;

    function __construct() {
        $this->FacturationArtisanCrud = new _FacturationArtisan();
    }

    public function getFacturationArtisanByID($interventionID, $artisanID) {
        return $this->FacturationArtisanCrud->getFacturationArtisanByID($interventionID, $artisanID);
    }

    public function getAllFacturationArtisan() {
        return $this->FacturationArtisanCrud->getAllFacturationArtisans();
    }

}

?>