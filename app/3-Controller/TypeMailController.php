<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeMailController
 *
 * @author user
 */
require_once './1-Crud/_TypeMail.php';

class TypeMailController {

    //put your code here

    private $TypeMailCrud;

    function __construct() {
        $this->TypeMailCrud = new _TypeMail();
    }

    public function getTypeMailByID($id) {
        return $this->TypeMailCrud->getTypeMailByID($id);
    }

    public function getAllTypeMail() {
        return $this->TypeMailCrud->getAllTypeMail();
    }

}


?>
