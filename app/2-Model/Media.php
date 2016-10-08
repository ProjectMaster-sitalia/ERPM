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
class Media {
    //put your code here
    private $ID;
    private $path;
    private $typeMedia;
    public function getTypeMedia() {
        return $this->typeMedia;
    }

    public function setTypeMedia($typeMedia) {
        $this->typeMedia = $typeMedia;
    }

        function __construct($ID) {
        $this->ID = $ID;
    }
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($url) {
        $this->path = $url;
    }


    
}

?>