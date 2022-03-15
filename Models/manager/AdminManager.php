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
            if (password_verify($password, $admin['password'])) {
                $_SESSION['admin'] = $admin;
                header('LOCATION: ?c=espace-admin');
            }
            else {
                echo '<p class="alert error-alert"><strong>Adresse mail ou mot de passe invalide !</strong></p>';
            }
        }
        else {
            echo '<p class="alert error-alert"><strong>Adresse mail ou mot de passe invalide !</strong></p>';
        }

    }


    public static function changeAdminData(string $username, string $mail, string $password, $id) {
        //todo à terminer
        $result = Connect::getPDO()->prepare("UPDATE ftk09_admin 
                                                    SET username = :username, mail = :mail, password= :password 
                                                    WHERE '{$id}'");

        $result->bindValue(':username',$username);
        $result->bindValue(':mail', $mail);
        $result->bindValue(':password', $password);

        $result->execute();
    }



}

