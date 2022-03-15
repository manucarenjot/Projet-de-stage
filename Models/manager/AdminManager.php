<?php

use App\Connect\Connect;
use App\entity\Admin;

class AdminManager extends Admin
{
    public static function connectUserWithMail(string $mail)
    {
        $result = Connect::getPDO()->prepare("SELECT * FROM ftk09_admin WHERE mail = '{$mail}'");

        $result->execute();
        $admin = $result->fetch();
        if ($admin) {
            echo 'l\'adresse est valide';
        }
        else {
            echo 'adresse invalide';
        }

    }

}

