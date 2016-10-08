<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Magasin
 *
 * @author kzexo
 */
class Magasin {

    //put your code here
    private $ID;
    private $adresseFacturation;
    private $companieID;
    private $adressePhysique;

    function __construct($ID) {
        $this->ID = $ID;
    }

    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getAdresseFacturation() {
        return $this->adresseFacturation;
    }

    public function setAdresseFacturation($adresseFacturation) {
        $this->adresseFacturation = $adresseFacturation;
    }

    public function getCompanieID() {
        return $this->companieID;
    }

    public function setCompanieID($companieID) {
        $this->companieID = $companieID;
    }

    public function getAdressePhysique() {
        return $this->adressePhysique;
    }

    public function setAdressePhysique($adressePhysique) {
        $this->adressePhysique = $adressePhysique;
    }

}

?>