<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeMediaController
 *
 * @author user
 */
require_once './1-Crud/_TypeMedia.php';

class TypeMediaController {

    //put your code here

    private $TypeMediaCrud;

    function __construct() {
        $this->TypeMediaCrud = new _TypeMedia();
    }

    public function getTypeMediaByID($id) {
        return $this->TypeMediaCrud->getTypeMediaByID($id);
    }

    public function getAllTypeMedia() {
        return $this->TypeMediaCrud->getAllTypeMedia();
    }

}


?>
