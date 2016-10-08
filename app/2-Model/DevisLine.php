<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DevisLine
 *
 * @author user
 */
class DevisLine {
    //put your code here
    
    private $ID;
    private $devisID;
    private $description;
    private $unite;
    private $prixUnitaire;
    private $quantite;
    private $prixHT;
    private $typeInterventionID;
    
    function __construct($ID) {
        $this->ID = $ID;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function getDevisID() {
        return $this->devisID;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getUnite() {
        return $this->unite;
    }

    public function getPrixUnitaire() {
        return $this->prixUnitaire;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function getPrixHT() {
        return $this->prixHT;
    }

    public function getTypeInterventionID() {
        return $this->typeInterventionID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setDevisID($devisID) {
        $this->devisID = $devisID;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setUnite($unite) {
        $this->unite = $unite;
    }

    public function setPrixUnitaire($prixUnitaire) {
        $this->prixUnitaire = $prixUnitaire;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function setPrixHT($prixHT) {
        $this->prixHT = $prixHT;
    }

    public function setTypeInterventionID($typeInterventionID) {
        $this->typeInterventionID = $typeInterventionID;
    }


    
}

?>
