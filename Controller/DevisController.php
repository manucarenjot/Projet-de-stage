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
            if (isset($_FILES["carteGrise"])) {
                $allowedMimeTypes = ['text/plain', 'image/jpeg', 'image/png'];
                if (in_array($_FILES['carteGrise']['type'], $allowedMimeTypes)) {
                    if ($_FILES['carteGrise']['error'] === 0) {
                        $tmp_name = $_FILES['carteGrise']["tmp_name"];

                        $name = getRandomName($_FILES['carteGrise']["name"]);
                        if (!is_dir('uploads')) {
                            mkdir('uploads', '0755');
                        }
                        move_uploaded_file($tmp_name, 'uploads/' . $name);

                        echo '<p class="success">upload réussi !</p><br>';
                        echo $name . '<br>';
                        foreach ($_FILES['carteGrise'] as $key => $value) {
                            echo "$key => $value <br><br>";
                        }
                    } else {
                        echo '<p>Une erreur s\'est produite lors de l\'upload du fichier!</p>';
                    }
                } else {
                    echo '<br><p>le type du fichier n\'est pas autorisé !</p>';
                }
            }

            echo '<div>'.$phone . $mail . $greyCard. $carPicture . $captcha .'</div>';
        }
    }
}