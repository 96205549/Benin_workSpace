<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bworkspace</title>
        <link href="<?= $this->url->getBaseURI ();?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= $this->url->getBaseURI ();?>public/css/signin.css" rel="stylesheet">
        <link href="<?= $this->url->getBaseURI ();?>public/css/now-ui-kit.css?v=1.1.0" rel="stylesheet">
        <link href="<?= $this->url->getBaseURI ();?>public/css/demo.css" rel="stylesheet">


    </head>
    <body>
    <style>
    .marketing .col-lg-3 {
        margin-bottom: 20px;
        text-align: center;
    }

    .marketing h2 {
        font-weight: normal;
    }

    .marketing .col-lg-3 p {
        margin-right: 10px;
        margin-left: 10px;
    }
    
    body {
        background-image: url('<?= $this->url->get("public/img/blurred-image-1.jpg")?>');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<a href="index.volt"></a>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="<?= $this->url->get("index")?>">Bworkspace</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item navbar-right active">
                <a class="nav-link" href="<?= $this->url->get("")?>">Entreprises</a>
            </li>

            <li class="nav-item navbar-right active">
                <a class="nav-link" href="<?= $this->url->get("particulier/particulier")?>">Particuliers</a>
            </li>
            <li class="nav-item navbar-right active">
                <a class="nav-link" href="<?= $this->url->get("prestataire/prestataires")?>">Prestataires</a>
            </li>
            <li class="nav-item navbar-right active">
                <a class="nav-link" href="<?= $this->url->get("offre/offre")?>">Offres d'emploi</a>
            </li>

            <li class="nav-item navbar-right active">
                <a class="nav-link" href="<?= $this->url->get("job/job")?>">Job de vacances</a>
            </li>

            <li class="nav-item navbar-right active">
            </li>
            <li class="nav-item">
                <a class="btn btn-info" href="<?php
                                if ($this->session->has('id_ent')){
                                     echo $this->url->get("entreprise/profil");
                        }elseif($this->session->has('id_prest')){
                            echo $this->url->get("prestataire/profil");}
                        elseif($this->session->has('id_part'))
                                {echo $this->url->get("particulier/profil");}?>" role="button">Profil</a>
            </li>

            <li class="nav-item">
                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#Modal" role="button">Connexion</a>
            </li>
         </ul>
         </div>
        
            </nav>
            <form method="post" action="<?= $this->url->get("index/login")?>">
<br>
<br>   
                <!-- Modal -->
                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Se connecter en tant que:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <div class="modal-body">

                                <input type="radio" name="type" value="Entreprise"> Entreprise
                                <br/>
                                <input type="radio" name="type" value="Particulier"> Particulier
                                <br/>
                                <input type="radio" name="type" value="Prestataire"> Prestataire
                                <br/>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <input type="submit" class="btn btn-primary" value="Valider">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </form>
<div class="col-lg-6" class="nav justify-content-end">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
      <div>
        <span class="input-group-btn">
            <button type="button" class="btn btn-primary "><span class="glyphicon glyphicon-search">Search</span></a>
        </span>
      </div>
    </div>
</div>
            {{ content() }}
        </div>
    
    <script src="<?= $this->url->getBaseURI ();?>public/vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?= $this->url->getBaseURI ();?>public/vendor/popper/popper.min.js" type="text/javascript"></script>
    <script src="<?= $this->url->getBaseURI ();?>public/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= $this->url->getBaseURI ();?>public/js/js/plugins/bootstrap-switch.js"></script>
    <script src="<?= $this->url->getBaseURI ();?>public/js/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="<?= $this->url->getBaseURI ();?>public/js/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?= $this->url->getBaseURI ();?>public/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
    </body>
    <footer>
      <div class="container">
        <p class="m-0 text-center text-black">Copyright &copy; Kyrigami 2017</p>
      </div>
      <!-- /.container -->
    </footer>
</html>
