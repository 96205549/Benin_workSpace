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
    body {
        background-image: url('img/.png');
    }

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

</style>
<br/>
<br/>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index/index">Bworkspace</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">


            <li class="nav-item navbar-right active">
                <a class="nav-link" href="index">Entreprises</a>
            </li>

            <li class="nav-item navbar-right active">
                <a class="nav-link" href="<?= $this->url->get("particulier/particulier")?>">Particuliers</a>
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
                <a class="btn btn-info" href="<?= $this->url->get("entreprise/landing-page")?>" role="button">Profil</a>
            </li>

            <li class="nav-item">
                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#Modal" role="button">Connexion</a>
            </li>
            </nav>

            <form method="post" action="<?= $this->url->get("index/login")?>">
                <p style="margin-left:1200px;"></p>

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

        <div class="container">
      
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

        </div>
            <?= $this->getContent() ?>
        </div>
<footer>
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Kyrigami 2017</p>
      </div>
      <!-- /.container -->
    </footer>
    <script src="<?= $this->url->getBaseURI ();?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?= $this->url->getBaseURI ();?>public/vendor/popper/popper.min.js"></script>
    <script src="<?= $this->url->getBaseURI ();?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
