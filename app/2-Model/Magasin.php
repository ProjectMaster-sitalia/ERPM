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
    private $compagnie;
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

    public function getCompagnie() {
        return $this->compagnie;
    }

    public function setCompagnie($compagnie) {
        $this->compagnie = $compagnie;
    }

    public function getAdressePhysique() {
        return $this->adressePhysique;
    }

    public function setAdressePhysique($adressePhysique) {
        $this->adressePhysique = $adressePhysique;
    }

}

?>