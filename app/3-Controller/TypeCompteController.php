<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeCompteController
 *
 * @author user
 */

require_once './1-Crud/_TypeCompte.php';

class TypeCompteController {

    //put your code here

    private $TypeCompteCrud;

    function __construct() {
        $this->TypeCompteCrud = new _TypeCompte();
    }

    public function getTypeCompteByID($id) {
        return $this->TypeCompteCrud->getTypeCompteByID($id);
    }

    public function getAllTypeCompte() {
        return $this->TypeCompteCrud->getAllTypeCompte();
    }

}

?>
