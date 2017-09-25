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
                    return $this->response->redirect($this->url->getBaseUri() . "offre/delete", true);
                } else {
                    $this->flashSession->error("Echec d'enregistrement");
                    return $this->response->redirect($this->url->getBaseUri() . "offre/delete", true);
                }
            }
        } else {
            $this->flashSession->error("Connecter vous");
            return $this->response->redirect($this->url->getBaseUri() . "index", true);
        }
    }
    public function deleteAction() {
       
        $req1 = offre::find();
        //die(var_dump($req1));
        $this->view->tab = $req1;

        if ($this->request->isPost()) {
            $id = $this->request->getPost("id_of");
            foreach ($id as $value) {
                $req = offre::findById_of($value);

                $req->delete();
            }
            if ($req) {
                $this->flashSession->success("Supression effectue avec sucess");
                return $this->response->redirect( $this->url->getBaseUri()."offre/delete",true);
            } else {
                $this->flashSession->error("Echec de supression");
                return $this->response->redirect( $this->url->getBaseUri()."offre/delete",true);
            }
        }
        elseif (isset ($_GET['id_url'])) {
            
            $id =$_GET['id_url'];
            
                $req = offre::findById_of($id);

                $req->delete();
            
            if ($req) {
                $this->flashSession->success("Supression effectue avec sucess");
                return $this->response->redirect( $this->url->getBaseUri()."offre/delete",true);
            } else {
                $this->flashSession->error("Echec de supression");
                return $this->response->redirect( $this->url->getBaseUri()."offre/delete",true);
            }
        }
        }
        
         public function updateAction() {
       if (isset($_GET['id_url'])) { 
        
       $id = $_GET['id_url'];
        $req = offre::findById_of($id);
       $this->view->tab = $req;}

        


       if ($this->request->isPost())  {
            
            $poste = $this->request->getPost("poste");
                //die(var_dump($nom));
                $diplome = $this->request->getPost("diplome");
                $duree = $this->request->getPost("duree");
                $expiration = $this->request->getPost("expiration");
                $id= $this->request->getPost("id");
                
        $req = offre::findById_of($id);
            //die(var_dump($poste));
            
            //die(var_dump($id));
            $req->update(['poste'=>$poste,'diplome'=>$diplome,'duree'=>$duree,'expiration'=>strtotime($expiration)]);
            //die(var_dump($req));
            
            
            if ($req) {
                $this->flash->success("Modification effectue avec sucess");
                return $this->response->redirect( $this->url->getBaseUri()."offre/delete",true);
            } else {
                $this->flash->error("Echec de Modification");
                return $this->response->redirect( $this->url->getBaseUri()."offre/delete",true);
            }
        }
    }
}
