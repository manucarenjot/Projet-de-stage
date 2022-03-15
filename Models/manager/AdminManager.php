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
            //todo à vérifier
            $_SESSION['admin'] = $admin;

            echo "<pre>";
            var_dump($_SESSION['admin']);
            echo "</pre>";

            header('LOCATION: ?c=espace-admin');


            if (password_verify($password, $admin['password'])) {


            }
        }
        else {
            echo '<p class="alert error-alert"><strong>Adresse mail invalide !</strong></p>';
        }

    }


    public static function changeAdminData() {
        //todo à terminer
        $result = Connect::getPDO()->prepare("UPDATE ftk09_admin SET username = :username, mail = :mail, password= :password WHERE '{$_SESSION['id']}'");
    }

}

