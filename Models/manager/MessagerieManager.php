<?php

use App\Connect\Connect;

class MessagerieManager
{


    public static function sendMessage($name, $firstname, $mail, $phone, $message)
    {


        $insert = Connect::getPDO()->prepare("INSERT INTO ftk09_messagerie (name, firstname, mail, phone, messages, date)
                                                    VALUES ('{$name}', '{$firstname}', '{$mail}', '{$phone}', '{$message}', NOW())");

        $insert->execute();
    }

    public static function getMessage()
    {
        $select = Connect::getPDO()->prepare("SELECT id, name, firstname,date  FROM ftk09_messagerie ORDER BY date DESC ");

        if ($select->execute()) {
            foreach ($datas = $select->fetchAll() as $data) {
                ?>
                <p>_</p><br>

                <div class="message">
                    <div class="coordonner">

                        <a href="?c=espace-admin&a=messages&id=<?= $data['id'] ?>"><?= $data['name'] ?> <?= $data['firstname'] ?>
                            <br> <?= $data['date'] ?></a><br><br>

                    </div>
                </div>
                <?php
                if (isset($_GET['id'])) { ?>
                    <?php
                }

            }
        }
    }

    public static function getMessageById($id)
    {
        $select = Connect::getPDO()->prepare("SELECT * FROM ftk09_messagerie where id= '{$id}'");

        if ($select->execute()) {
            foreach ($datas = $select->fetchAll() as $data) {?>
                <p class="name"><?= $data['name'] ?></p><p class="firstname"><?= $data['firstname'] ?></p><p
                        class="date"><?= $data['date'] ?></p>
                <p class="mail"><?= $data['mail'] ?></p><p class="phone"><?= $data['phone'] ?></p>
                <p class="content"><?= $data['messages'] ?></p>
<?php
            }
        }
    }
}