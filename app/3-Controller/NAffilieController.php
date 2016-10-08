<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NAffilie
 *
 * @author kzexo
 */
require_once './1-Crud/_NAffilie.php';

class NAffilieController {

    //put your code here

    private $NAffilieCrud;

    function __construct() {
        $this->NAffilieCrud = new _NAffilie();
    }

    public function getNAffilieByID($id) {
        return $this->NAffilieCrud->getNAffilieByID($id);
    }

    public function getAllNAffilie() {
        return $this->NAffilieCrud->getAllNAffilies();
    }

}

?>