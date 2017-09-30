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
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

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
    
     public function deleteAction() {
       
        
// Current page to show
// In a controller/component this can be:
// $this->request->getQuery("page", "int"); // GET
// $this->request->getPost("page", "int"); // POST
$currentPage = (int) $_GET["page"];
// The data set to paginate
$jobvacance = jobvacance::find();
// Create a Model paginator, show 10 rows by page starting from $currentPage
$paginator = new PaginatorModel(
[
"data" => $jobvacance,
"limit" => 1,
"page" => $currentPage,
]
);
// Get the paginated results
$page = $paginator->getPaginate();
$this->view->page = $page;

        if ($this->request->isPost()) {
            $id = $this->request->getPost("id_job");
            foreach ($id as $value) {
                $req = jobvacance::findById_job($value);

                $req->delete();
            }
            if ($req) {
                $this->flashSession->success("Supression effectue avec sucess");
                return $this->response->redirect( $this->url->getBaseUri()."job/delete",true);
            } else {
                $this->flashSession->error("Echec de supression");
                return $this->response->redirect( $this->url->getBaseUri()."job/delete",true);
            }
        }
        elseif (isset ($_GET['id_url'])) {
            
            $id =$_GET['id_url'];
            
                $req = jobvacance::findById_job($id);

                $req->delete();
            
            if ($req) {
                $this->flashSession->success("Supression effectue avec sucess");
                return $this->response->redirect( $this->url->getBaseUri()."job/delete",true);
            } else {
                $this->flashSession->error("Echec de supression");
                return $this->response->redirect( $this->url->getBaseUri()."job/delete",true);
            }
        }
        }
        
         public function updateAction() {
       if (isset($_GET['id_url'])) { 
        
       $id = $_GET['id_url'];
        $req = jobvacance::findById_job($id);
       $this->view->tab = $req;}

        


       if ($this->request->isPost())  {
            
            $poste = $this->request->getPost("poste");
                //die(var_dump($nom));
                $diplome = $this->request->getPost("diplome");
                $duree = $this->request->getPost("duree");
                $expiration = $this->request->getPost("expiration");
                $id= $this->request->getPost("id");
                
        $req = jobvacance::findById_job($id);
            //die(var_dump($poste));
            
            //die(var_dump($id));
            $req->update(['poste'=>$poste,'diplome'=>$diplome,'duree'=>$duree,'expiration'=>strtotime($expiration)]);
            //die(var_dump($req));
            
            
            if ($req) {
                $this->flash->success("Modification effectue avec sucess");
                return $this->response->redirect( $this->url->getBaseUri()."job/delete",true);
            } else {
                $this->flash->error("Echec de Modification");
                return $this->response->redirect( $this->url->getBaseUri()."job/delete",true);
            }
        }
    }
}
