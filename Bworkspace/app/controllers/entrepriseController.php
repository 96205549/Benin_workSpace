<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntrepriseController
 *
 * @author USER
 */
use Phalcon\Mvc\Controller;

class entrepriseController extends controller {

    //put your code here
    public function indexAction() {
        
    }
    

    public function entrepriseAction() {
        
    }
    public function profilAction() {
        if ($this->session->has('id_ent') ){
         $id = $this->session->get('id_ent');
            // die(var_dump($id));
            $req = entreprise::findById_ent($id);
            $this->view->tab = $req;
        
        }elseif(isset($_GET["id"])){
            $id = $_GET["id"];
            // die(var_dump($id));
            $req = entreprise::findById_ent($id);
            $this->view->tab = $req;}
    }

    public function inscriptionEntAction() {
        $req = categori::find();
        $this->view->tab = $req;
        if ($this->request->isPost()) {

            $nom = $this->request->getPost("nom");
            //die(var_dump($nom));
            $region = $this->request->getPost("region");
            $mail = $this->request->getPost("mail");
            $adresse = $this->request->getPost("adresse");
            $telephone = $this->request->getPost("telephone");
            $password = sha1($this->request->getPost("password"));
            $cpassword = sha1($this->request->getPost("cpassword"));
            $categori = $this->request->getPost("categori");
            //echo $id_fil;
            $req = entreprise::findFirst([
                        "mail = :mail:", "bind" => [
                            "mail" => $mail,
                        ]
            ]);
            // die(var_dump($req));
            if ($req == NULL) {
                if ($password == $cpassword) {
                    //  var_dump($password);
                    // die(var_dump($cpassword));

                    $ets = new entreprise();
                    $ets->nom = $nom;
                    $ets->region = $region;
                    $ets->mail = $mail;
                    $ets->adresse = $adresse;
                    $ets->setTelephone($telephone);

                    $ets->password = $password;

                    // die(var_dump($ets));
                    $var = $ets->save();
                    //  die(var_dump($var));
                    if ($var) {
                        $req = entreprise::findFirst([
                                    "mail = :mail:  AND password = :password:", "bind" => [
                                        "mail" => $mail,
                                        "password" => $password
                                    ]
                        ]);
                        // die(var_dump($req));
                        foreach ($categori as $value) {
                            $cat = new categoriser();
                            $cat->setId_cat($value);

                            $cat->setId_ent($req->getId_ent());

                            //die(var_dump($cat));
                            $var = $cat->save();
                        }
                        $this->flashSession->success("Enregistrement effectue avec sucess");
                        return $this->response->redirect($this->url->getBaseUri() . "index/index", true);
                    } else {
                        $this->flashSession->error("Echec d'enregistrement");
                        return $this->response->redirect($this->url->getBaseUri() . "entreprise/inscriptionEnt", true);
                    }
                } else {
                    $this->flashSession->error("Password non correct");
                    return $this->response->redirect($this->url->getBaseUri() . "entreprise/inscriptionEnt", true);
                }
            } else {
                $this->flashSession->error("Mail deja utilisé");
                return $this->response->redirect($this->url->getBaseUri() . "entreprise/inscriptionEnt", true);
            }
        }
    }

    

    public function loginAction() {
        $login = $this->request->getPost("mail");
        $password = sha1($this->request->getPost("password"));
        $req = entreprise::findFirst([
                    "mail = :mail:  AND password = :password:", "bind" => [
                        "mail" => $login,
                        "password" => $password
                    ]
        ]);
        //die( var_dump($req));
        if ($req) {

            $this->session->set('id_ent', $req->getId_ent());


            //die(var_dump($_SESSION['id']));
            return $this->response->redirect($this->url->getBaseUri() . "entreprise/profil", true);
        } else {
            $this->flashSession->error("Echec d'authentification");
            return $this->response->redirect($this->url->getBaseUri() . "index", true);
        }
// The validation has failed
    }

    public function updateEntAction() {
        $req = categori::find();
        $this->view->tab = $req;
        if ($this->session->has('id_ent')) {

            $id = $this->session->get('id_ent');
            // die(var_dump($id));
            $req1 = entreprise::findById_ent($id);
            $this->view->tab1 = $req1;
        }




        if ($this->request->isPost()) {

            $nom = $this->request->getPost("nom");
            //die(var_dump($nom));
            $region = $this->request->getPost("region");
            $mail = $this->request->getPost("mail");
            $adresse = $this->request->getPost("adresse");
            $telephone = $this->request->getPost("telephone");
            $password = sha1($this->request->getPost("password"));

            $categori = $this->request->getPost("categori");
            $siteweb = $this->request->getPost("siteweb");
            $description = $this->request->getPost("description");
            $req = entreprise::findFirst([
                        "mail = :mail:  AND password = :password:", "bind" => [
                            "mail" => $mail,
                            "password" => $password
                        ]
            ]);
            if ($req != NULL) {
                if ($this->request->hasFiles()) {
                    $files = $this->request->getUploadedFiles();

                    // Print the real file names and sizes
                    foreach ($files as $file) {
                        if (!$file->isUploadedFile()) {
                            exit("Le fichier est introuvable");
                        }
                        $temp_name = $file->getTempName();
                        $type = $file->getExtension();
                        $chaine = md5(uniqid(rand(), true));
                        $name_file = "{" . $chaine . "}" . "." . "{$type}";
                        if (!strstr($type, 'jpg') && !strstr($type, 'jpeg') && !strstr($type, 'bmp') && !strstr($type, 'gif') && !strstr($type, 'png')) {
                            exit("Le fichier n'est pas une image");
                        } elseif (!move_uploaded_file($temp_name, $this->uploadEnt . $name_file)) {
                            exit("Impossible de copier le fichier dans $content_dir");
                        }
                        $logo = "/public/uploadent/".$name_file;
                        //die(var_dump($logo));
                        // die(var_dump($type));
                        // Move the file into the application
                    }
                }

                $id = $this->session->get('id_ent');
                $req = entreprise::findById_ent($id);


                //die(var_dump($id));
                $req->update(['nom' => $nom, 'region' => $region, 'mail' => $mail, 'adresse' => $adresse, 'telephone' => $telephone, 'siteweb' => $siteweb, 'description' => $description, 'logo' => $logo]);

                foreach ($categori as $value) {

                    $q = categoriser::findFirst([
                                "id_ent = :id_ent:  AND id_cat = :id_cat:", "bind" => [
                                    "id_ent" => $id,
                                    "id_cat" => $value
                                ]
                    ]);
                    if ($q == NULL) {
                        $cat = new categoriser();
                        $cat->setId_cat($value);

                        $cat->setId_ent($id);

                        //die(var_dump($cat));
                        $var = $cat->save();
                    }
                }

                if ($req) {
                    $this->flashSession->success("Modification effectue avec sucess");
                    return $this->response->redirect($this->url->getBaseUri() . "entreprise/profil", true);
                } else {
                    $this->flashSession->error("Echec de Modification");
                    return $this->response->redirect($this->url->getBaseUri() . "entreprise/updateEnt", true);
                }
            } else {
                $this->flashSession->error("Echec d'authentification");
                return $this->response->redirect($this->url->getBaseUri() . "entreprise/updateEnt", true);
            }
        }
    }

    public function deconnectionAction() {

        $this->session->remove('id_ent');
        $this->session->destroy();
        // die( var_dump($_SESSION['id']));
// Close session
// 
// ...
// A HTTP Redirect
        return $this->response->redirect($this->url->getBaseUri() . "index", true);
    }

   

}
