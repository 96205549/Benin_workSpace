<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of prestataireController
 *
 * @author as-andchanou
 */
use Phalcon\Mvc\Controller;

class prestataireController extends Controller {

    public function indexAction() {
        
    }

    public function prestataireAction() {
        
    }

    public function inscriptionPrestAction() {
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
            $req = prestataire::findFirst([
                        "mail = :mail:", "bind" => [
                            "mail" => $mail,
                        ]
            ]);
            // die(var_dump($req));
            if ($req == NULL) {
                if ($password == $cpassword) {
                    //  var_dump($password);
                    // die(var_dump($cpassword));

                    $prest = new prestataire();
                    $prest->nom = $nom;
                    $prest->region = $region;
                    $prest->mail = $mail;
                    $prest->adresse = $adresse;
                    $prest->setTelephone($telephone);

                    $prest->password = $password;

                    // die(var_dump($prest));
                    $var = $prest->save();
                    //  die(var_dump($var));
                    if ($var) {
                        $req = prestataire::findFirst([
                                    "mail = :mail:  AND password = :password:", "bind" => [
                                        "mail" => $mail,
                                        "password" => $password
                                    ]
                        ]);
                        // die(var_dump($req));
                        foreach ($categori as $value) {
                            $cat = new categoriser_prest_prest();
                            $cat->setId_cat($value);

                            $cat->setId_prest($req->getId_prest());

                            //die(var_dump($cat));
                            $var = $cat->save();
                        }
                        $this->flash->success("Enregistrement effectue avec sucess");
                        return $this->response->redirect($this->url->getBaseUri() . "index/index", true);
                    } else {
                        $this->flash->error("Echec d'enregistrement");
                        return $this->response->redirect($this->url->getBaseUri() . "prestataire/inscriptionPrest", true);
                    }
                } else {
                    $this->flash->error("Password non correct");
                    return $this->response->redirect($this->url->getBaseUri() . "prestataire/inscriptionPrest", true);
                }
            } else {
                $this->flash->error("Mail deja utilisé");
                return $this->response->redirect($this->url->getBaseUri() . "prestataire/inscriptionPrest", true);
            }
        }
    }

    public function profilAction() {
        
    }

    public function loginAction() {
        $login = $this->request->getPost("mail");
        $password = sha1($this->request->getPost("password"));
        $req = prestataire::findFirst([
                    "mail = :mail:  AND password = :password:", "bind" => [
                        "mail" => $login,
                        "password" => $password
                    ]
        ]);
        //die( var_dump($req->getId_prest()));
        if ($req) {

            $this->session->set('id_prest', $req->getId_prest());


            //die(var_dump($_SESSION['id']));
            return $this->response->redirect($this->url->getBaseUri() . "prestataire/profil", true);
        } else {
            $this->flash->error("Echec d'authentification");
            return $this->response->redirect($this->url->getBaseUri() . "index", true);
        }
// The validation has failed
    }

    public function updateprestAction() {
        $req = categori::find();
        $this->view->tab = $req;
        if ($this->session->has('id_prest')) {

            $id = $this->session->get('id_prest');
             //die(var_dump($id));
            $req1 = prestataire::findById_prest($id);
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
            $req = prestataire::findFirst([
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
                        } elseif (!move_uploaded_file($temp_name, $this->uploadprest . $name_file)) {
                            exit("Impossible de copier le fichier dans $content_dir");
                        }
                        $logo = $name_file;
                        //die(var_dump($logo));
                        // die(var_dump($type));
                        // Move the file into the application
                    }
                }

                $id = $this->session->get('id_prest');
                $req = prestataire::findById_prest($id);


                //die(var_dump($id));
                $req->update(['nom' => $nom, 'region' => $region, 'mail' => $mail, 'adresse' => $adresse, 'telephone' => $telephone, 'siteweb' => $siteweb, 'description' => $description, 'logo' => $logo]);

                foreach ($categori as $value) {

                    $q = categoriser_prest::findFirst([
                                "id_prest = :id_prest:  AND id_cat = :id_cat:", "bind" => [
                                    "id_prest" => $id,
                                    "id_cat" => $value
                                ]
                    ]);
                    if ($q == NULL) {
                        $cat = new categoriser_prest();
                        $cat->setId_cat($value);

                        $cat->setId_prest($id);

                        //die(var_dump($cat));
                        $var = $cat->save();
                    }
                }

                if ($req) {
                    $this->flash->success("Modification effectue avec sucess");
                    return $this->response->redirect($this->url->getBaseUri() . "prestataire/profil", true);
                } else {
                    $this->flash->error("Echec de Modification");
                    return $this->response->redirect($this->url->getBaseUri() . "prestataire/updateprest", true);
                }
            } else {
                $this->flash->error("Echec d'authentification");
                return $this->response->redirect($this->url->getBaseUri() . "prestataire/updateprest", true);
            }
        }
    }
    public function deconnectionAction() {

        $this->session->remove('id_prest');
        $this->session->destroy();
        // die( var_dump($_SESSION['id']));
// Close session
// 
// ...
// A HTTP Redirect
        return $this->response->redirect($this->url->getBaseUri() . "index", true);
    }

}
