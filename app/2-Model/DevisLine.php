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
    private $devis;
    private $description;
    private $unite;
    private $prixUnitaire;
    private $quantite;
    private $prixHT;
    private $typeIntervention;
    
    function __construct($ID) {
        $this->ID = $ID;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function getDevis() {
        return $this->devis;
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

    public function getTypeIntervention() {
        return $this->typeIntervention;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setDevis($devis) {
        $this->devis = $devis;
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

    public function setTypeIntervention($typeIntervention) {
        $this->typeIntervention = $typeIntervention;
    }


    
}

?>
