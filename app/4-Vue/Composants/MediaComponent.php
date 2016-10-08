<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MediaComponent
 *
 * @author kzexo
 */
require_once './3-Controller/MediaController.php';
require_once './2-Model/Media.php';
require_once './1-Crud/_Media.php';

class MediaComponent {

    //put your code here

    private $MediaController;
    private $Media;

    function __construct() {

        $this->MediaController = new MediaController();
        
    }

    public function getMediaTestVue($id) {

        $this->Media = $this->MediaController->getMediaByID($id);
        if ($this->Media) {
            var_dump($this->Media);
            $ID = $this->Media->getID();
            $adresseFacturation = $this->Media->getPath();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$adresseFacturation</p>");
            return $output;
        }
        else
            return null;
    }

    public function setMediaController($MediaController) {
        $this->MediaController = $MediaController;
    }

}

?>