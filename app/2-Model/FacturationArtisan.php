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
class FacturationArtisan {

    //put your code here

    private $typeIntervention;
    private $typeArtisan;
    private $listeMedia;
    private $accompte;
    private $coutHT;

    public function gettypeArtisan() {
        return $this->typeArtisan;
    }

    public function settypeArtisan($typeArtisan) {
        $this->typeArtisan = $typeArtisan;
    }

    function __construct($interventionID, $typeArtisan) {
        $this->typeIntervention = $interventionID;
        $this->typeArtisan = $typeArtisan;
    }

    public function gettypeIntervention() {
        return $this->typeIntervention;
    }

    public function settypeIntervention($ID) {
        $this->typeIntervention = $ID;
    }

    public function getListeMedia() {
        return $this->listeMedia;
    }

    public function setListeMedia($listeMedia) {
        $this->listeMedia = $listeMedia;
    }

    public function getAccompte() {
        return $this->accompte;
    }

    public function setAccompte($accompte) {
        $this->accompte = $accompte;
    }

    public function getCoutHT() {
        return $this->coutHT;
    }

    public function setCoutHT($coutHT) {
        $this->coutHT = $coutHT;
    }

}

?>