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

class particulier extends Model {

    //put your code here
    //put your code here
    private $id_part;
    private $nom;
    private $password;
    private $telephone;
    private $cv;
    private $diplome;
    private $an;
    private $mail;
    private $profession;
    private $region;
    function getId_part() {
        return $this->id_part;
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

    function getCv() {
        return $this->cv;
    }

    function getDiplome() {
        return $this->diplome;
    }

    function getAn() {
        return $this->an;
    }

    function getMail() {
        return $this->mail;
    }

    function getProfession() {
        return $this->profession;
    }

    function getRegion() {
        return $this->region;
    }

    function setId_part($id_part) {
        $this->id_part = $id_part;
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

    function setCv($cv) {
        $this->cv = $cv;
    }

    function setDiplome($diplome) {
        $this->diplome = $diplome;
    }

    function setAn($an) {
        $this->an = $an;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setProfession($profession) {
        $this->profession = $profession;
    }

    function setRegion($region) {
        $this->region = $region;
    }

            public function initialize() {
        $this->setSource('particulier');
        $this->hasMany('id_part', 'postuler_offre', 'id_part');
        $this->hasMany('id_part', 'postuler_job', 'id_part');
        
    }

}
