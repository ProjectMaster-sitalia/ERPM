<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeIntervention
 *
 * @author kzexo
 */
class TypeIntervention {
    //put your code here
    private $ID;
    private $libelle;
    
    function __construct($ID) {
        $this->ID = $ID;
    }
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }



}

?>
