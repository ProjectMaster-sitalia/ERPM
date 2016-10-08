<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MagasinComponent
 *
 * @author kzexo
 */
require_once './3-Controller/MagasinController.php';
require_once './2-Model/Magasin.php';
require_once './1-Crud/_Magasin.php';

class MagasinComponent {

    //put your code here

    private $MagasinController;
    private $Magasin;

    function __construct() {

        $this->MagasinController = new MagasinController();
        
    }

    public function getMagasinTestVue($id) {

        $this->Magasin = $this->MagasinController->getMagasinByID($id);
        if ($this->Magasin) {
            var_dump($this->Magasin);
            $ID = $this->Magasin->getID();
            $adresseFacturation = $this->Magasin->getAdresseFacturation();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$adresseFacturation</p>");
            return $output;
        }
        else
            return null;
    }

    public function setMagasinController($MagasinController) {
        $this->MagasinController = $MagasinController;
    }

}

?>