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

class categori extends Model {

    //put your code here
    private $id_cat;
    private $nom;
    function getId_cat() {
        return $this->id_cat;
    }

    function getNom() {
        return $this->nom;
    }

    function setId_cat($id_cat) {
        $this->id_cat = $id_cat;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

        
        public function initialize() {
        $this->setSource('categori');
        $this->hasMany('id_cat', 'categoriser', 'id_cat');
    }

}
