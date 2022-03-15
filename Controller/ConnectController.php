<?php

class ConnectController extends AbstractController
{


    public function login() {
        $this->render('private/connect');
        if ($this->getPost()) {
            $mail = $_POST['mail'];
            $password = $_POST['password'];
        }
    }

    public function index()
    {
        // TODO: Implement index() method.
    }
}
