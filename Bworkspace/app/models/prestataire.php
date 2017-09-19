<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of entreprise
 *
 * @author USER
 */
use Phalcon\Mvc\Model;

class prestataire extends Model {

    //put your code here
    //put your code here
    private $id_prest;
    private $nom;
    private  $password;
    private $telephone;
    private $adresse;
    private $siteweb;
    private $logo;
    private $description;
    private $mail;
    private $region;
    
    function getId_prest() {
        return $this->id_prest;
    }

    function getNom() {
        return $this->nom;
    }

    function getPassword() {
        return $this->password;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getSiteweb() {
        return $this->siteweb;
    }

    function getLogo() {
        return $this->logo;
    }

    function getDescription() {
        return $this->description;
    }

    function getMail() {
        return $this->mail;
    }

    function getRegion() {
        return $this->region;
    }

    function setId_prest($id_prest) {
        $this->id_prest = $id_prest;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setSiteweb($siteweb) {
        $this->siteweb = $siteweb;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setRegion($region) {
        $this->region = $region;
    }

    
    public function initialize() {
        $this->setSource('prestataire');
        $this->hasMany('id_prest', 'categoriser_prest', 'id_prest');
       
    }

}
