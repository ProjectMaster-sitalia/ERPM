<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Compagnie
 *
 * @author kzexo
 */
class Compagnie {

    //put your code here

    private $ID;
    private $manager;
    private $libelle;
    private $logo;
    private $listeMagasins;
    private $adresseFacturation;

    function __construct($ID) {
        $this->ID = $ID;
    }

    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getManager() {
        return $this->manager;
    }

    public function setManager($manager) {
        $this->manager = $manager;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function getLogo() {
        return $this->logo;
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function getListeMagasins() {
        return $this->listeMagasins;
    }

    public function setListeMagasins($listeMagasins) {
        $this->listeMagasins = $listeMagasins;
    }

    public function getAdresseFacturation() {
        return $this->adresseFacturation;
    }

    public function setAdresseFacturation($adresseFacturation) {
        $this->adresseFacturation = $adresseFacturation;
    }

}

?>