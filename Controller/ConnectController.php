<?php

class ConnectController extends AbstractController
{


    public function login() {

        if ($this->getPost()) {
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            AdminManager::connectUserWithMail($mail);
        }
    }

    public function index()
    {
        $this->render('private/connect');

    }
}
