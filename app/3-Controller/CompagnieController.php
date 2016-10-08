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

    private $CompagnieCrud;

    function __construct() {
        $this->CompagnieCrud = new _Compagnie();
    }

    public function getCompagnieByID($id) {
        return $this->CompagnieCrud->getCompagnieByID($id);
    }

    public function getAllCompagnie() {
        return $this->CompagnieCrud->getAllCompagnies();
    }

}

?>