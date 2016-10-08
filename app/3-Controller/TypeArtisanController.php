<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeArtisanController
 *
 * @author user
 */
require_once './1-Crud/_TypeArtisan.php';

class TypeArtisanController {

    //put your code here

    private $TypeArtisanCrud;

    function __construct() {
        $this->TypeArtisanCrud = new _TypeArtisan();
    }

    public function getTypeArtisanByID($id) {
        return $this->TypeArtisanCrud->getTypeArtisanByID($id);
    }

    public function getAllTypeArtisan() {
        return $this->TypeArtisanCrud->getAllTypeArtisan();
    }

}


?>
