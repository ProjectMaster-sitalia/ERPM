<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NAffilie
 *
 * @author kzexo
 */
class NAffilie extends Magasin {

    //put your code here
    private $ID;

    function __construct($ID) {
        parent::__construct($ID);
        $this->$ID = $ID;
    }

    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getAdresseFacturation() {
        return $this->getAdresseFacturation();
    }

    public function getAdressePhysique() {
        return parent::getAdressePhysique();
    }

    public function getCompanieID() {
        return parent::getCompanieID();
    }

    public function setAdressePhysique($adressePhysique) {
        parent::setAdressePhysique($adressePhysique);
    }

    public function setCompanieID($companieID) {
        parent::setCompanieID($companieID);
    }

    public function setAdresseFacturation($adresseFacturation) {
        parent::setAdresseFacturation($adresseFacturation);
    }

}

?>