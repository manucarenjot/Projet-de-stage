<?php


class DevisController extends AbstractController
{
    public function index()
    {
        $this->render('form/devis');
        if ($this->getPost()) {
            $phone = $_POST['phone-number'];
            $mail = $_POST['mail'];
            if (isset($_SESSION['carteGrise'])) {
                $greyCard = $_SESSION['carteGrise'];
            }
            if (isset($_SESSION['photoVoiture'])) {
                $carPicture = $_SESSION['photoVoiture'];
            }
            $captcha = $_POST['captcha'];
// A travailler ça fonctionne pas



            echo '<div>'.$phone . $mail . $greyCard. $carPicture . $captcha .'</div>';
        }
    }
}