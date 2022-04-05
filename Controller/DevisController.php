<?php


class DevisController extends AbstractController
{
    public function index()
    {
        $this->render('form/devis');
        if ($this->getPost()) {
            $phone = $_POST['phone-number'];
            $mail = $_POST['mail'];
            $greyCard = $_POST['carteGrise'];
            $carPicture = $_POST['photoVoiture'];
            $captcha = $_POST['captcha'];
// A travailler ça fonctionne pas


            echo '<div>'.$phone . $mail . $greyCard. $carPicture . $captcha .'</div>';
        }
    }
}