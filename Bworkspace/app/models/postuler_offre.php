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

class postuler_offre extends Model {

    //put your code here
    private $id;
    private $id_part;
    private $id_of;
   
    
    function getId() {
        return $this->id;
    }

    function getId_part() {
        return $this->id_part;
    }

    function getId_of() {
        return $this->id_of;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_part($id_part) {
        $this->id_part = $id_part;
    }

    function setId_of($id_of) {
        $this->id_of = $id_of;
    }

                    public function initialize() {
        $this->setSource('postuler_offre');
        $this->belongsTo('id_part', 'particulier', 'id_part');
        $this->belongsTo('id_of','offre','id_of');
        
    }

}
