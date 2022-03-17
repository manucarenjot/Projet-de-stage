<?php

class ContactController extends AbstractController
{

    public function index()
    {
        $this->render('form/contact');
        if ($this->getPost()) {
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
            } else {
                if (strlen($_POST['name']) <= 2 || strlen($_POST['name']) >= 255) {
                    $alert[] = 'le nom doit contenir entre 2 et 255 caractères !';
                }
                if (strlen($_POST['firstname']) <= 2 || strlen($_POST['firstname']) >= 255) {
                    $alert[] = 'le prenom doit contenir entre 2 et 255 caractères !';
                }
                if (strlen($_POST['message']) < 2) {
                    $alert[] = 'Le contenu du message doit contenir au minimum 2 caractères ';
                }
                if (!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['phone-number'])) {
                    $alert[] = 'Le numéro de téléphone ne doit contenir que des chiffre';
                }
            }

            if (count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=contact');
            } else {
                $alert = [];
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $name = trim(htmlentities($_POST['name']));
                    $firstname = trim(htmlentities($_POST['firstname']));
                    $mail = trim(($_POST['mail']));
                    $phone = trim(strip_tags($_POST['phone-number']));
                    $message = trim(htmlentities($_POST['message']));

                    MessagerieManager::sendMessage($name, $firstname, $mail, $phone, $message);
                    $alert[] = 'Message envoyé';
                } else {
                    $alert[] = 'l\'adresse mail n\'est pas valide';
                }


            }
            if (count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=contact');
            }
        }
    }
}