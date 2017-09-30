<?php

use Phalcon\Mvc\Controller;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class particulierController extends Controller {

    public function indexAction() {
        
    }

    public function particulierAction() {
        $currentPage = (int) $_GET["page"];
// The data set to paginate
        $ets = particulier::find();
// Create a Model paginator, show 10 rows by page starting from $currentPage
        $paginator = new PaginatorModel(
                [
            "data" => $ets,
            "limit" => 8,
            "page" => $currentPage,
                ]
        );
// Get the paginated results
        $page = $paginator->getPaginate();
        $this->view->page = $page;
    }

    public function inscriptionPartAction() {
        
    }

    public function profilAction() {
        $id = $this->session->get('id_part');
        //die(var_dump($id));
        $req = particulier::findById_part($id);
        //die(var_dump($req));
        $this->view->tab = $req;
    }

    public function loginAction() {
        $login = $this->request->getPost("mail");
        $password = sha1($this->request->getPost("password"));
        $req = particulier::findFirst([
                    "mail = :mail:  AND password = :password:", "bind" => [
                        'mail' => $login,
                        'password' => $password
                    ]
        ]);
        //die(var_dump($req));
        if ($req) {

            $this->session->set('id_part', $req->getId_part());
            //die(var_dump($_SESSION['id']));
            return $this->response->redirect($this->url->getBaseUri() . "particulier/profil", true);
        } else {
            $this->flash->error("Echec d'authentification");
            return $this->response->redirect($this->url->getBaseUri() . "index", true);
        }
    }

    public function ajoutAction() {
        if ($this->request->isPost()) {
            $nom = $this->request->getPost("nom");
            $prenom = $this->request->getPost("prenom");
            $mail = $this->request->getPost("mail");
            $region = $this->request->getPost("region");
            $telephone = $this->request->getPost("telephone");
            $password1 = $this->request->getPost("password1");
            $password2 = $this->request->getPost("password2");
        }
        $var = particulier::findfirst([
                    "mail = :mail:", "bind" => [
                        "mail" => $mail,
                    ]
        ]);
        if ($var == NULL) {
            if ($password1 == $password2) {
                $password = sha1($password1);
                $newparticulier = new particulier();
                $newparticulier->nom = $nom;
                $newparticulier->prenom = $prenom;
                $newparticulier->mail = $mail;
                $newparticulier->telephone = $telephone;
                $newparticulier->region = $region;
                $newparticulier->password = $password;

                $success = $newparticulier->save();
            } else {
                return $this->response->redirect("http://localhost:8888/particulier/inscriptionPart", true);
            }
        }
        // Store and check for errors

        if ($success) {
            $this->flash->success("Enregistrement effectuer avec succès");
            $this->response->redirect($this->url->getBaseUri() . "particulier/inscriptionPart", true);
        } else {
            $this->flash->error("Enregistrement non effectuer veuiller vérifier le formulaire");
        }
    }

    public function updatePartAction() {
        if ($this->request->isPost()) {
            //die(var_dump($this->session->get('id_part')));
            if ($this->session->has('id_part')) {
                $id = $this->session->get('id_part');
                $password_raw = $this->request->getPost("password");
                $password_part = sha1($password_raw);
                $req = particulier::findById_part($id);
                if ($req) {
                    foreach ($req as $value) {
                        //die(var_dump($value->getPassword()));
                        if ($password_part == $value->getPassword()) {

                            $nom = $this->request->getPost("nom");
                            $prenom = $this->request->getPost("prenom");
                            $diplome = $this->request->getPost("diplome");
                            $an = $this->request->getPost("an");
                            $profession = $this->request->getPost("profession");
                            $region = $this->request->getPost("region");
                            //die(var_dump($prenom));
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
                                    if (!strstr($type, 'docx') && !strstr($type, 'txt') && !strstr($type, 'pdf') && !strstr($type, 'pages') && !strstr($type, 'doc')) {
                                        exit("Ce fichier n'est pas permis");
                                    } elseif (!move_uploaded_file($temp_name, $this->uploadcv . $name_file)) {
                                        exit("Impossible de copier le fichier dans $content_dir");
                                    }
                                }
                            }
                            $req->update(['nom' => $nom, 'prenom' => $prenom, 'diplome' => $diplome, 'an' => $an, 'profession' => $profession, 'region' => $region, 'cv' => $name_file]);
                        }
                    }
                } else {

                    $this->response->redirect($this->url->getBaseUri() . "particulier/profil", true);
                }
            }
        }
    }

    public function deconnectionAction() {

        $this->session->remove('id_part');
        $this->session->destroy();

        return $this->response->redirect($this->url->getBaseUri() . "index", true);
    }

}
