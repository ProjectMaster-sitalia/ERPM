<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Intervention
 *
 * @author kzexo
 */
class Intervention {

    //put your code here

    private $ID;
    private $dateReception;
    private $dateIntervention;
    private $client;
    private $artisans;
    private $facturationsArtisans;
    private $facturationClient;
    private $mails;
    private $team;
    private $status;
    private $magasin;


    function __construct($ID) {
        $this->ID = $ID;
    }

    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getClient() {
        return $this->client;
    }

    public function setClient($client) {
        $this->client = $client;
    }

    public function getartisans() {
        return $this->artisans;
    }

    public function setartisans($artisans) {
        $this->artisans = $artisans;
    }

    public function getMails() {
        return $this->mails;
    }

    public function setMails($mails) {
        $this->mails = $mails;
    }

    public function getTeam() {
        return $this->team;
    }

    public function setTeam($team) {
        $this->team = $team;
    }
    
    public function getMagasin() {
        return $this->magasin;
    }

    public function setMagasin($magasin) {
        $this->magasin = $magasin;
    }

    public function getDateReception() {
        return $this->dateReception;
    }
    
    public function getDateIntervention() {
        return $this->dateIntervention;
    }
    public function setDateIntervention($dateIntervention) {
        $this->dateIntervention = $dateIntervention;
    }

    public function getFacturationsArtisans() {
        return $this->facturationsArtisans;
    }

    public function setFacturationsArtisans($facturationsArtisans) {
        $this->facturationsArtisans = $facturationsArtisans;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDateReception($dateReception) {
        $this->dateReception = $dateReception;
    }

    public function getFacturationsArtisan() {
        return $this->facturationsArtisan;
    }

    public function setFacturationsArtisan($facturationsArtisan) {
        $this->facturationsArtisan = $facturationsArtisan;
    }

    public function getFacturationClient() {
        return $this->facturationClient;
    }

    public function setFacturationClient($facturationClient) {
        $this->facturationClient = $facturationClient;
    }

}

?>