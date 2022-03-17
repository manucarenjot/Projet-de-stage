<?php

use App\Connect\Connect;

class MessagerieManager
{


    public static function sendMessage($name, $firstname, $mail, $phone, $message) {
        $insert = Connect::getPDO()->prepare("INSERT INTO ftk09_messagerie (name, firstname, mail, phone, messages, date)
                                                    VALUES ('{$name}', '{$firstname}', '{$mail}', '{$phone}', '{$message}', NOW())");

         $insert->execute();
    }

    public static function getMessage() {
        $select = Connect::getPDO()->prepare("SELECT * FROM ftk09_messagerie");

        if ($select->execute()) {
            foreach ($datas = $select->fetchAll() as $data) {
                $date = date($data['date'] = 'd m Y H:i:s',); ?>

        <div class="message">
            <div class="coordonner">
                _
                <p class="date"><?=$date?></p>
                <p class="mail"><?=$data['mail']?></p><p class="phone"><?=$data['phone']?></p>
                <p class="name"><?=$data['name']?></p><p class="firstname"><?=$data['firstname']?></p>
            </div>
        </div>
<?php
            }
        }
    }
}