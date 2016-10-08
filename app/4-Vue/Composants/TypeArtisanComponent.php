<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeArtisanComponent
 *
 * @author user
 */
require_once './3-Controller/TypeArtisanController.php';
require_once './2-Model/TypeArtisan.php';
require_once './1-Crud/_TypeArtisan.php';

class TypeArtisanComponent {

    //put your code here

    private $TypeArtisanController;
    private $TypeArtisan;

    function __construct() {

        $this->TypeArtisanController = new TypeArtisanController();
        
    }

    public function getTypeartisanestVue($id) {

        $this->TypeArtisan = $this->TypeArtisanController->getTypeArtisanByID($id);
        if ($this->TypeArtisan) {
            var_dump($this->TypeArtisan);
            $ID = $this->TypeArtisan->getID();
            $libelle = $this->TypeArtisan->getLibelle();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$libelle</p>");
            return $output;
        }
        else
            return null;
    }

    public function setTypeArtisanController($TypeArtisanController) {
        $this->TypeArtisanController = $TypeArtisanController;
    }

}

?>
