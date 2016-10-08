<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeMediaComponent
 *
 * @author user
 */
require_once './3-Controller/TypeMediaController.php';
require_once './2-Model/TypeMedia.php';
require_once './1-Crud/_TypeMedia.php';

class TypeMediaComponent {

    //put your code here

    private $TypeMediaController;
    private $TypeMedia;

    function __construct() {

        $this->TypeMediaController = new TypeMediaController();
        
    }

    public function getTypeMediaTestVue($id) {

        $this->TypeMedia = $this->TypeMediaController->getTypeMediaByID($id);
        if ($this->TypeMedia) {
            var_dump($this->TypeMedia);
            $ID = $this->TypeMedia->getID();
            $libelle = $this->TypeMedia->getLibelle();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$libelle</p>");
            return $output;
        }
        else
            return null;
    }

    public function setTypeMediaController($TypeMediaController) {
        $this->TypeMediaController = $TypeMediaController;
    }

}

?>
