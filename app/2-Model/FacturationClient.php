<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacturationClient
 *
 * @author kzexo
 */
class FacturationClient {
    //put your code here
    
    private $ID;
    private $listeDevis;
    private $listeMails;
    private $listeMedia;
    
    function __construct($ID) {
        $this->ID = $ID;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getListeDevis() {
        return $this->listeDevis;
    }

    public function setListeDevis($listeDevis) {
        $this->listeDevis = $listeDevis;
    }

    public function getListeMails() {
        return $this->listeMails;
    }

    public function setListeMails($listeMails) {
        $this->listeMails = $listeMails;
    }

    public function getListeMedia() {
        return $this->listeMedia;
    }

    public function setListeMedia($listeMedia) {
        $this->listeMedia = $listeMedia;
    }



}

?>