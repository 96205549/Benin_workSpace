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

class categoriser extends Model {

    //put your code here
    private $id;
    private $id_cat;
    private $id_ent;
   
    function getId() {
        return $this->id;
    }

    function getId_cat() {
        return $this->id_cat;
    }

    function getId_ent() {
        return $this->id_ent;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_cat($id_cat) {
        $this->id_cat = $id_cat;
    }

    function setId_ent($id_ent) {
        $this->id_ent = $id_ent;
    }

            public function initialize() {
        $this->setSource('categoriser');
        $this->belongsTo('id_ent', 'entreprise', 'id_ent');
        $this->belongsTo('id_cat','categori','id_cat');
        $this->hasMany('id_cat','categoriser_prest','id_cat');
    }

}
