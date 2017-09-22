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

class categoriser_prest extends Model {

    //put your code here
    private $id;
    private $id_cat;
    private $id_prest;
    function getId() {
        return $this->id;
    }

    function getId_cat() {
        return $this->id_cat;
    }

    function getId_prest() {
        return $this->id_prest;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_cat($id_cat) {
        $this->id_cat = $id_cat;
    }

    function setId_prest($id_prest) {
        $this->id_prest = $id_prest;
    }

        
    public function initialize() {
        $this->setSource('categoriser_prest');
        $this->belongsTo('id_prest', 'prestataire', 'id_prest');
        $this->belongsTo('id_cat','categori','id_cat');
        
    }

}
