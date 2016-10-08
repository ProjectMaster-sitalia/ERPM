<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Affilie
 *
 * @author kzexo
 */
require 'Magasin.php';
class Affilie extends Magasin {

    //put your code here

    private $magasinID;
    private $adresseFacturation;

    function __construct($ID) {
        parent::__construct($ID);
        $this->magasinID = $ID;
    }

    public function getID() {
        return $this->magasinID;
    }

    public function setID($ID) {
        $this->magasinID = $ID;
    }

    public function getAdresseFacturation() {
        return $this->adresseFacturation;
    }

    public function setAdresseFacturation($adresseFacturation) {
        parent::setAdresseFacturation($adresseFacturation);
        $this->adresseFacturation = $adresseFacturation;
    }

    
}

?>