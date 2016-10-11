<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Magasin
 *
 * @author kzexo
 */
require_once './1-Crud/_Magasin.php';

class MagasinController {

    //put your code here

    private $MagasinCrud;

    function __construct() {
        $this->MagasinCrud = new _Magasin();
    }

    public function getMagasinByID($id) {
        return $this->MagasinCrud->getMagasinByID($id);
    }

    public function getAllMagasin() {
        return $this->MagasinCrud->getAllMagasins();
    }
    
    public function updateMagasin($magasinObject){
        $this->MagasinCrud->updateMagasin($magasinObject);
    }
    
    public function addMagasin($magasinObject){
        $this->MagasinCrud->addMagasin($magasinObject);
    }
    
    public function deleteMagasin($ID){
        $this->MagasinCrud->deleteMagasin($ID);
    }

}

?>