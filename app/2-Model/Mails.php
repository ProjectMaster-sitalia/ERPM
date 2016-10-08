<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mails
 *
 * @author kzexo
 */
class Mails {

    //put your code here

    private $ID;
    private $date;
    private $objet;
    private $content;
    private $typeMail;
    private $pjs; 
    public function getTypeMail() {
        return $this->typeMail;
    }

    public function setTypeMail($typeMail) {
        $this->typeMail = $typeMail;
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

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getObjet() {
        return $this->objet;
    }

    public function setObjet($objet) {
        $this->objet = $objet;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getPjs() {
        return $this->pjs;
    }

    public function setPjs($pjs) {
        $this->pjs = $pjs;
    }

}

?>