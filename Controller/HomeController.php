<?php


class HomeController extends AbstractController

{


    public function index()
    {
        $this->render('public/home');
        ServicesManager::readServiceDB();
        if ($this->getPost()) {
            //TODO verifier les champs !!!

            $title = trim(strip_tags($_POST['title']));
            $description = trim(htmlentities($_POST['description']));

            ServicesManager::addService($title, $description);
        }
    }

}