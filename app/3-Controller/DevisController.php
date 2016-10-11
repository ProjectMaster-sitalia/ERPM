<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DevisController
 *
 * @author user
 */
require_once './1-Crud/_Devis.php';

class DevisController {

    //put your code here

    private $devisCrud;

    function __construct() {
        $this->devisCrud = new _Devis();
    }

    public function getDevisByID($id) {
        return $this->devisCrud->getDevisByID($id);
    }

    public function getAllDevis() {
        return $this->devisCrud->getAllDeviss();
    }
    
    public function updateDevis($DevisObject){
        $this->devisCrud->updateDevis($DevisObject);
    }
    
    public function addDevis($DevisObject){
        $this->devisCrud->addDevis($DevisObject);
    }
    
    public function deleteDevis($DevisObject){
        $this->devisCrud->deleteDevis($DevisObject);
    }

}

?>
