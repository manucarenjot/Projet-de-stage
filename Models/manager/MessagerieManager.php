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
        $select = Connect::getPDO()->prepare("SELECT id, name, firstname, mail, date  FROM ftk09_messagerie ORDER BY date DESC ");

        if ($select->execute()) {
            ?>
            <h1>Messages</h1>
            <div class="messagerie">

            <div class="expediteur">
                <?php
                foreach ($datas = $select->fetchAll() as $data) {
                    ?>
                    <p>_</p><br>
                    <div class="coordonner">
                        <a href="?c=espace-admin&a=messages&id=<?= $data['id'] ?>">- <?= $data['name'] ?>  <?= $data['firstname'] ?></a>
                        <form method="post" action="?c=espace-admin&a=messages&id=<?= $data['id'] ?>">
                            <input type="submit" name="delete" id="delete" value="&#45">
                        </form>
                    </div>
                    <?php
                }
                ?>
            </div>

            <?php
        }
    }


    public static function getMessageById($id)
    {
        $select = Connect::getPDO()->prepare("SELECT * FROM ftk09_messagerie where id= '{$id}'");

        if ($select->execute()) {

            foreach ($datas = $select->fetchAll() as $data) {

                ?>

                <div class="message">
                    <p class="name">De : <?= $data['name'] ?> <?= $data['firstname'] ?></p>
                    <p class="date"> Envoyé le : <?= date('d-m-y  à H:i', strtotime($data['date'])) ?></p>
                    <p class="mail"> E-mail : <a href="mailto:<?= $data['mail'] ?>"
                                                 class="coordonnerData"><?= $data['mail'] ?></a></p>
                    <p class="phone">Numéro de téléphone : <a href="tel:<?= $data['phone'] ?>"
                                                              class="coordonnerData"><?= $data['phone'] ?></a></p>
                    <br>
                    <p class="content" >Message :  <?=$data['messages'] ?></p>
                </div>
                </div>
                <?php
            }
        }
    }

    public static function deleteMessage($id)
    {
        $delete = Connect::getPDO()->prepare("DELETE FROM ftk09_messagerie WHERE id = '{$id}'");
        if ($delete->execute()) {
            header('LOCATION: ?c=espace-admin&a=messages');
        }
    }
}