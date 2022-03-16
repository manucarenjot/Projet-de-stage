<?php


class HomeController extends AbstractController

{


    public function index()
    {
        $this->render('public/home');
        ServicesManager::readServiceDB();
        if ($this->getPost()) {
            $alert = [];
            //TODO verifier les champs !!!
            if (empty($_POST['title'])) {
                $alert[] = 'Il manque le champs "Titre"';
            }
            if (empty($_POST['description'])) {
                $alert[] = 'Il manque le champs "Description"';
            }

            if(count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=home');
            }
            else {
                $title = trim(strip_tags($_POST['title']));
                $description = trim(htmlentities($_POST['description']));

                ServicesManager::addService($title, $description);
            }

        }

        if ($this->getDelete()) {

            ServicesManager::deleteService($_GET['id']);
        }
    }

}