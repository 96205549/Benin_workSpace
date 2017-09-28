<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of jobController
 *
 * @author as-andchanou
 */
use Phalcon\Mvc\Controller;
class jobController extends Controller
{

    public function indexAction()
    {

    }

    public function jobAction() {
        
    }
    public function ajoutjobAction() {

        if ($this->session->has('id_ent')) {



            if ($this->request->isPost()) {

                $poste = $this->request->getPost("poste");
                //die(var_dump($nom));
                $diplome = $this->request->getPost("diplome");
                $duree = $this->request->getPost("duree");
                $expiration = $this->request->getPost("expiration");
                $id_ent = $this->session->get('id_ent');

                $job = new jobvacance();
                $job->poste = $poste;
                $job->diplome = $diplome;
                $job->duree = $duree;
                $job->expiration = strtotime($expiration);
                // die(var_dump($ets));
                $job->setId_ent($id_ent);
               // die(var_dump($job));
                $var = $job->save();
                //  die(var_dump($var));
                if ($var) {

                    $this->flash->success("Enregistrement effectue avec sucess");
                    return $this->response->redirect($this->url->getBaseUri() . "job/ajoutjob", true);
                } else {
                    $this->flash->error("Echec d'enregistrement");
                    return $this->response->redirect($this->url->getBaseUri() . "job/ajoutjob", true);
                }
            }
        } else {
            $this->flash->error("Connecter vous");
            return $this->response->redirect($this->url->getBaseUri() . "index", true);
        }
    }
}
