<?php

use App\Connect\Connect;

class DevisManager {


    public static function addDevis(string $phone, string $mail, string $greyCard, string $carPicture) {
        $insert = Connect::getPDO()->prepare("INSERT INTO ftk09_devis (phone, mail, grey_card, car_picture) VALUES (:phone, :mail, :grey_card, :car_picture) ");

        $insert->bindValue(':phone', $phone);
        $insert->bindValue(':mail', $mail);
        $insert->bindValue(':grey_card', $greyCard);
        $insert->bindValue(':car_picture', $carPicture);

        if ($insert->execute()) {
            $alert[] = '<div class="alert-succes">Demande de devis envoyé !</div>';
            if(count($alert) > 0) {
                $_SESSION['alert'] = $alert;
            }
        }
    }
}