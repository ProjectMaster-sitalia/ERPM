<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Artisan
 *
 * @author kzexo
 */
class Artisan {

    //put your code here
    private $ID;
    private $adresse;
    private $firstName;
    private $name;
    private $mail;
    private $mail2;
    private $commentaire;
    private $phone;
    private $phone2;
    private $phone3;
    private $company;
    private $address;
    private $type;
    private $exchangeId;
    private $fiabilite;
    private $typeContact;
    
    function __construct($ID) {
        $this->ID = $ID;
    }
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function getMail2() {
        return $this->mail2;
    }

    public function setMail2($mail2) {
        $this->mail2 = $mail2;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone2() {
        return $this->phone2;
    }

    public function setPhone2($phone2) {
        $this->phone2 = $phone2;
    }

    public function getPhone3() {
        return $this->phone3;
    }

    public function setPhone3($phone3) {
        $this->phone3 = $phone3;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getExchangeId() {
        return $this->exchangeId;
    }

    public function setExchangeId($exchangeId) {
        $this->exchangeId = $exchangeId;
    }

    public function getFiabilite() {
        return $this->fiabilite;
    }

    public function setFiabilite($fiabilite) {
        $this->fiabilite = $fiabilite;
    }

    public function getTypeContact() {
        return $this->typeContact;
    }

    public function setTypeContact($typeContact) {
        $this->typeContact = $typeContact;
    }


    

}

?>