<?php

class ContactController extends AbstractController
{

    public function index()
    {
        $this->render('form/contact');
        if ($this->getPost()) {
            $alert = [];

            if (empty($_POST['name'])) {
                $alert[] = '<div class="alert-error">il manque un champs</div>';

            }
            if (empty($_POST['firstname'])) {
                $alert[] = '<div class="alert-error">il manque un champs</div>';

            }
            if (empty($_POST['mail'])) {
                $alert[] = '<div class="alert-error">il manque un champs</div>';

            }
            if (empty($_POST['phone-number'])) {
                $alert[] = '<div class="alert-error">il manque un champs</div>';

            }
            if (empty($_POST['message'])) {
                $alert[] = '<div class="alert-error">il manque un champs</div>';
            } else {
                if (strlen($_POST['name']) <= 2 || strlen($_POST['name']) >= 255) {
                    $alert[] = '<div class="alert-error">le nom doit contenir entre 2 et 255 caractères !</div>';
                }
                if (strlen($_POST['firstname']) <= 2 || strlen($_POST['firstname']) >= 255) {
                    $alert[] = '<div class="alert-error">le prénom doit contenir entre 2 et 255 caractères !</div>';
                }
                if (strlen($_POST['message']) < 2) {
                    $alert[] = '<div class="alert-error">Le contenu du message doit contenir au minimum 2 caractères </div>';
                }
                if (!preg_match("/\\+[0-9][0-9][0-9]( [0-9][0-9])+|([0-9]+)$/", trim($_POST['phone-number']))) {
                    $alert[] = '<div class="alert-error">Le numéro de téléphone ne doit contenir que des chiffres</div>';
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
                    $alert[] = '<div class="alert-succes">Message envoyé</div>';
                } else {
                    $alert[] = '<div class="alert-error">l\'adresse mail n\'est pas valide</div>';
                }


            }
            if (count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=contact');
            }
        }
    }
}