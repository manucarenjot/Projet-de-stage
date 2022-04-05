<?php

use App\Connect\Connect;

class DevisManager {


    public static function addDevis(string $phone, string $mail) {
        $insert = Connect::getPDO()->prepare("INSERT INTO ftk09_devis (phone, mail) VALUES (:phone, :mail) ");

        $insert->bindValue(':phone', $phone);
        $insert->bindValue(':mail', $mail);

        if ($insert->execute()) {
            $alert[] = '<div class="alert-succes">Demande de devis envoyé !</div>';
            if(count($alert) > 0) {
                $_SESSION['alert'] = $alert;
            }
        }
    }

    public static function addGreyCard($greyCard) {
        $insert = Connect::getPDO()->prepare("INSERT INTO ftk09_devis (grey_card) VALUES (:grey_card) ");
        $insert->bindValue(':grey_card', $greyCard);

        if ($insert->execute()) {
            $alert[] = '<div class="alert-succes">La carte grise a bien été envoyé !</div>';
            if(count($alert) > 0) {
                $_SESSION['alert'] = $alert;
            }
        }
    }

    public static function addCarPicture($carPicture) {
        $insert = Connect::getPDO()->prepare("INSERT INTO ftk09_devis (car_picture) VALUES (:car_picture) ");
        $insert->bindValue(':car_picture', $carPicture);

        if ($insert->execute()) {
            $alert[] = '<div class="alert-succes">La photo du véhicule a bien été envoyé !</div>';
            if(count($alert) > 0) {
                $_SESSION['alert'] = $alert;
            }
        }
    }
}