<?php

use App\Connect\Connect;
use App\entity\Admin;

class AdminManager extends Admin
{
    public static function connectUserWithMail(string $mail, string $password)
    {
        $result = Connect::getPDO()->prepare("SELECT * FROM ftk09_admin WHERE mail = '{$mail}'");

        $result->execute();
        $admin = $result->fetch();
        if ($admin) {
            echo 'l\'adresse est valide ';
            if (password_verify($password, $admin['password'])) {
                session_start();
                $_SESSION['admin'] = $admin;
            }
        }
        else {
            echo '<p class="alert error-alert"><strong>Adresse mail invalide !</strong></p>';
        }

    }

}

