<?php

use App\Connect\Connect;
use App\entity\Admin;

class AdminManager extends Admin
{
    public static function connectUserWithMail(string $mail, string $password)
    {
        $alert = [];
        $result = Connect::getPDO()->prepare("SELECT * FROM ftk09_admin WHERE mail = '{$mail}'");

        $result->execute();
        $admin = $result->fetch();
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $_SESSION['admin'] = $admin;
                header('LOCATION: ?c=espace-admin');
            }
            else {
                $alert[] = 'Adresse e-mail ou mot de passe invalide !';
                if(count($alert) > 0) {
                    $_SESSION['alert'] = $alert;
                    header('LOCATION: ?c=connect&a=login');
                }

            }
        }
        else {
            $alert[] = 'Adresse e-mail ou mot de passe invalide !';
            if(count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=connect&a=login');
            }
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

