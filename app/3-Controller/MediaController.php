<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Media
 *
 * @author kzexo
 */
require_once './1-Crud/_Media.php';

class MediaController {

    //put your code here

    private $MediaCrud;

    function __construct() {
        $this->MediaCrud = new _Media();
    }

    public function getMediaByID($id) {
        return $this->MediaCrud->getMediaByID($id);
    }

    public function getAllMedia() {
        return $this->MediaCrud->getAllMedias();
    }

}

?>