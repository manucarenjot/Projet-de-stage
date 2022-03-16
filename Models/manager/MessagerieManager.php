<?php

use App\Connect\Connect;

class MessagerieManager
{


    public static function getMessage($name, $firstname, $mail, $phone, $message) {
        $insert = Connect::getPDO()->prepare("INSERT INTO ftk09_messagerie (name, firstname, mail, phone, messages, date)
                                                    VALUES '{$name}', '{$firstname}', '{$mail}', '{$phone}', '{$message}', NOW()");

        if ($insert->execute()) {

            header('LOCATION: ?c=contact');
        }
    }
}