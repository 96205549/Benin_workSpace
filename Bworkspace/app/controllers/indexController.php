<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller {

    public function indexAction() {
        
    }

    public function loginAction() {
        if ($this->request->isPost()) {
            $type = $this->request->getPost("type");


            if ($type == "Entreprise") {


                $action = $this->url->get("entreprise/login");
                $lien = $this->url->get("entreprise/inscriptionEnt");
            } elseif ($type == "Particulier") {
                $action = $this->url->get("particulier/login");
                $lien = $this->url->get("particulier/inscriptionPart");
            } elseif ($type == "Prestataire") {
                $action = $this->url->get("prestataire/login");
                $lien = $this->url->get("prestataire/inscriptionPrest");
            }
        } else {
            
            $action=$this->url->get("index");
             $lien=$this->url->get("index");
            
}
$this->view->action = $action;
$this->view->lien = $lien;
}

}

