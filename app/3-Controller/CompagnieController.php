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
require_once './1-Crud/_Compagnie.php';

class CompagnieController {

    //put your code here

    private $compagnieCrud;

    function __construct() {
        $this->compagnieCrud = new _Compagnie();
    }

    public function getCompagnieByID($id) {
        return $this->compagnieCrud->getCompagnieByID($id);
    }

    public function getAllCompagnie() {
        return $this->compagnieCrud->getAllCompagnies();
    }
    
    public function updateCompagnie($CompagnieObject){
        $this->compagnieCrud->updateCompagnie($CompagnieObject);
    }
    
    public function deleteCompagnie($ID){
        $this->compagnieCrud->deleteCompagnie($ID);
    }

}

?>