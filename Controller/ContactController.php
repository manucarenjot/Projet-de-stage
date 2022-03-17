<?php

class ContactController extends AbstractController
{

    public function index()
    {
        $this->render('form/contact');
        if($this->getPost()) {
            $alert = [];

            if (empty($_POST['name'])) {
                $alert[] = 'il manque un champs';

            }
            if (empty($_POST['firstname'])) {
                $alert[] = 'il manque un champs';

            }
            if (empty($_POST['mail'])) {
                $alert[] = 'il manque un champs';

            }
            if (empty($_POST['phone-number'])) {
                $alert[] = 'il manque un champs';

            }
            if (empty($_POST['message'])) {
                $alert[] = 'il manque un champs';
            }
            else {

                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                    $name = trim(htmlentities($_POST['name']));
                    $firstname = trim(htmlentities($_POST['firstname']));
                    $mail = trim(($_POST['mail']));
                    $phone = trim(strip_tags($_POST['phone-number']));
                    $message = trim(htmlentities($_POST['message']));

                    MessagerieManager::sendMessage($name, $firstname, $mail, $phone, $message);
                    $alert[] = 'Message envoyé';
                }



            else {
                    $alert[] ='l\'adresse mail n\'est pas valide';
                }


            }
            if(count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=contact');
            }
        }
    }
}