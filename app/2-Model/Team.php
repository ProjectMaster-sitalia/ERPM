<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Team
 *
 * @author kzexo
 */
class Team {
    //put your code here
    
    private $ID;
    private $typeCompte;
    private $user;
    private $password; // a passer en MD5
    
    function __construct($ID) {
        $this->ID = $ID;
    }
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getTypeCompte() {
        return $this->typeCompte;
    }

    public function setTypeCompte($typeCompte) {
        $this->typeCompte = $typeCompte;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }


    
}

?>