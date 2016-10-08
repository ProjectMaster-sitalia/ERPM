<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Devis
 *
 * @author kzexo
 */
class Devis {
    //put your code here
    
    private $ID;
    private $statusDevis;
    private $DevisLines;
    
    function __construct($ID) {
        $this->ID = $ID;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getStatusDevis() {
        return $this->statusDevis;
    }

    public function setStatusDevis($statusDevis) {
        $this->statusDevis = $statusDevis;
    }

    public function getDevisLines() {
        return $this->DevisLines;
    }

    public function setDevisLines($DevisLines) {
        $this->DevisLines = $DevisLines;
    }



    
}

?>
