<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeContactController
 *
 * @author user
 */
require_once './1-Crud/_TypeContact.php';

class TypeContactController {

    //put your code here

    private $TypeContactCrud;

    function __construct() {
        $this->TypeContactCrud = new _TypeContact();
    }

    public function getTypeContactByID($id) {
        return $this->TypeContactCrud->getTypeContactByID($id);
    }

    public function getAllTypeContact() {
        return $this->TypeContactCrud->getAllTypeContact();
    }

}


?>
