<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DevisLineController
 *
 * @author user
 */
require_once './1-Crud/_DevisLine.php';

class DevisLineController {

    //put your code here

    private $DevisLineCrud;

    function __construct() {
        $this->DevisLineCrud = new _DevisLine();
    }

    public function getDevisLineByID($id) {
        return $this->DevisLineCrud->getDevisLineByID($id);
    }

    public function getAllDevisLine() {
        return $this->DevisLineCrud->getAllDevisLine();
    }
    
    public function updateDevisLine($DevisLineObject){
        $this->DevisLineCrud->updateDevisLine($DevisLineObject);
    }
    
    public function addDevisLine($DevisLineObject){
        $this->DevisLineCrud->addDevisLine($DevisLineObject);
    }

}

?>
