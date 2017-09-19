<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of offre
 *
 * @author USER
 */
use Phalcon\Mvc\Model;

class jobvacance extends Model {

    //put your code here
    private $id_job;
    private $id_ent;
    private $poste;
    private $diplome;
    private $duree;
    private $expiration;

    function getId_job() {
        return $this->id_job;
    }

    function getId_ent() {
        return $this->id_ent;
    }

    function getPoste() {
        return $this->poste;
    }

    function getDiplome() {
        return $this->diplome;
    }

    function getDuree() {
        return $this->duree;
    }

    function getExpiration() {
        return $this->expiration;
    }

    function setId_job($id_job) {
        $this->id_job = $id_job;
    }

    function setId_ent($id_ent) {
        $this->id_ent = $id_ent;
    }

    function setPoste($poste) {
        $this->poste = $poste;
    }

    function setDiplome($diplome) {
        $this->diplome = $diplome;
    }

    function setDuree($duree) {
        $this->duree = $duree;
    }

    function setExpiration($expiration) {
        $this->expiration = $expiration;
    }

    
        public function initialize() {
        $this->setSource('jobvacance');
        $this->belongsTo('id_ent', 'entreprise', 'id_ent');
        $this->hasMany('id_job','postuler_job','id_job');
    }

}
