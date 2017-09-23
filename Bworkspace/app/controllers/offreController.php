<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of offre
 *
 * @author as-andchanou
 */
use Phalcon\Mvc\Controller;
class offreController extends controller {
    //put your code here
    public function indexAction()
    {

    }
    
    public function offreAction() {
        
    }
     public function ajoutoffreAction() {

        if ($this->session->has('id_ent')) {



            if ($this->request->isPost()) {

                $poste = $this->request->getPost("poste");
                //die(var_dump($nom));
                $diplome = $this->request->getPost("diplome");
                $duree = $this->request->getPost("duree");
                $expiration = $this->request->getPost("expiration");
                $id_ent = $this->session->get('id_ent');

                $offre = new offre();
                $offre->poste = $poste;
                $offre->diplome = $diplome;
                $offre->duree = $duree;
                $offre->expiration = strtotime($expiration);
                // die(var_dump($ets));
                $offre->setId_ent($id_ent);
               // die(var_dump($offre));
                $var = $offre->save();
                //  die(var_dump($var));
                if ($var) {

                    $this->flashSession->success("Enregistrement effectue avec sucess");
                    return $this->response->redirect($this->url->getBaseUri() . "offre/ajoutoffre", true);
                } else {
                    $this->flashSession->error("Echec d'enregistrement");
                    return $this->response->redirect($this->url->getBaseUri() . "offre/ajoutoffre", true);
                }
            }
        } else {
            $this->flashSession->error("Connecter vous");
            return $this->response->redirect($this->url->getBaseUri() . "index", true);
        }
    }
}
