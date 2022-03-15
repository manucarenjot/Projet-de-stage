<?php


class HomeController extends AbstractController

{


    public function index()
    {
        $this->render('public/home');
        if ($this->getPost()) {
            //TODO verifier les champs !!!

            $title = trim(strip_tags($_POST['title']));
            $description = trim(strip_tags($_POST['description']));

            ServicesManager::addService($title, $description);
        }
    }

}