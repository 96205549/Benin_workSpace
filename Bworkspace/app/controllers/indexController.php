<?php

use Phalcon\Mvc\Controller;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class IndexController extends Controller {

    public function indexAction() {
        $req = categori::find();
        $this->view->tab1 = $req;
        if ($this->request->isPost()) {
            $categori = $this->request->getPost("categori");

            $sqlPart = "";
            $sqlData = [];

            foreach ($categori as $key => $value) {
                // $sqlPart.= (!empty($sqlPart) ? " or ":""). "id_cat=:id_cat$key: " ;
                //$sqlData["id_cat$key"]=$value;
                $sqlPart .= (!empty($sqlPart) ? "," : "") . "?$key";
            }
            //die(var_dump($sqlPart));
            $req1 = categoriser::find(array('id_cat IN (' . $sqlPart . ')', 'bind' => $categori));
            $paginator = new PaginatorModel(
                    [
                "data" => $req1,
                "limit" => 1,
                "page" => $currentPage,
                    ]
            );
           // die(var_dump($req1));
// Get the paginated results
            $page = $paginator->getPaginate();
            $this->view->page = $page;
            $rech=true;
            $this->view->rech = $rech;
            //$req1= categoriser::find([$sqlPart, "bind" => $sqlData]);
            //die(var_dump($req1));
        } else {
            $currentPage = (int) $_GET["page"];
// The data set to paginate
            $ets = entreprise::find();
// Create a Model paginator, show 10 rows by page starting from $currentPage
            $paginator = new PaginatorModel(
                    [
                "data" => $ets,
                "limit" => 1,
                "page" => $currentPage,
                    ]
            );
// Get the paginated results
            $page = $paginator->getPaginate();
            $this->view->page = $page;
            $rech=false;
            $this->view->rech = $rech;
        }
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

            $action = $this->url->get("index");
            $lien = $this->url->get("index");
        }
        $this->view->action = $action;
        $this->view->lien = $lien;
    }

}
