<?php
class DevisController extends AbstractController
{
    public function index()
    {
        $this->render('form/devis');
        if ($this->getPost()) {
            $phone = $_POST['phone-number'];
            $mail = $_POST['mail'];
            $captcha = $_POST['captcha'];
            $alert = [];

            if (empty($_POST['phone-number'])) {
                $alert[] = '<div class="alert-error">il manque un champs</div>';
            }
            if (empty($_POST['mail'])) {
                $alert[] = '<div class="alert-error">il manque un champs</div>';
            }

            if (!preg_match("/\\+[0-9][0-9][0-9]( [0-9][0-9])+|([0-9]+)$/", trim($_POST['phone-number']))) {
                $alert[] = '<div class="alert-error">Le numéro de téléphone ne doit contenir que des chiffres</div>';
            }

            if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $alert[] = '<div class="alert-error">L\'adresse e_mail n\'est pas correcte !</div>';
            }

            if ($captcha != $_SESSION['captcha']) {
                $alert[] = '<div class="alert-error">Le captcha est incorrect !' . $captcha . ' ' . $_SESSION['captcha'];
            }
            if (isset($_SESSION['carteGrise'])) {
                $greyCard = $_SESSION['carteGrise'];
            }
            if (isset($_SESSION['photoVoiture'])) {
                $carPicture = $_SESSION['photoVoiture'];
            }
            if(count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=demande-de-devis');
            }




        }
    }
}