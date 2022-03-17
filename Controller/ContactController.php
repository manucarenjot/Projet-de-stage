<?php

class ContactController extends AbstractController
{

    public function index()
    {
        $this->render('form/contact');
        if($this->getPost()) {
            $name = trim(htmlentities($_POST['name']));
            $firstname = trim(htmlentities($_POST['firstname']));
            $mail = trim(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL));
            $phone = trim(strip_tags($_POST['phone-number']));
            $message = trim(htmlentities($_POST['message']));

            MessagerieManager::sendMessage($name, $firstname, $mail, $phone, $message);
        }
    }
}