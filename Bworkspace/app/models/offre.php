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

class offre extends Model {

    //put your code here
    private $id_of;
    private $id_ent;
    private $poste;
    private $diplome;
    private $duree;
    private $expiration;

    function getId_of() {
        return $this->id_of;
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

    function setId_of($id_of) {
        $this->id_of = $id_of;
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
        $this->setSource('offre');
        $this->belongsTo('id_ent', 'entreprise', 'id_ent');
        $this->hasMany('id_of','postuler_offre','id_of');
    }

}
