<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Affilie
 *
 * @author kzexo
 */
require_once './1-Crud/_Affilie.php';

class AffilieController {

    //put your code here

    private $affilieCrud;

    function __construct() {
        $this->affilieCrud = new _Affilie();
    }

    public function getAffilieByID($id) {
        return $this->affilieCrud->getAffilieByID($id);
    } 

    public function getAllAffilie() {
        return $this->affilieCrud->getAllAffilies();
    } 

}

?>