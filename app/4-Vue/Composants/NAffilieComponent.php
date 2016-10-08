<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NAffilieComponent
 *
 * @author kzexo
 */
require_once './3-Controller/NAffilieController.php';
require_once './2-Model/NAffilie.php';
require_once './1-Crud/_NAffilie.php';

class NAffilieComponent {

    //put your code here

    private $NAffilieController;
    private $NAffilie;

    function __construct() {

        $this->NAffilieController = new NAffilieController();
        
    }

    public function getNAffilieTestVue($id) {

        $this->NAffilie = $this->NAffilieController->getNAffilieByID($id);
        if ($this->NAffilie) {
          //  var_dump($this->NAffilie);
            $ID = $this->NAffilie->getID();
            
            $output = ("<h1>$ID</h1>");
            return $output;
        }
        else
            return null;
    }

    public function setNAffilieController($NAffilieController) {
        $this->NAffilieController = $NAffilieController;
    }

}

?>