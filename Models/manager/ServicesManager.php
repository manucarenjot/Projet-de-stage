<?php

use App\Connect\Connect;

class ServicesManager
{
    public static function addService(string $title, string $description)
    {
        $add = Connect::getPDO()->prepare("INSERT INTO ftk09_services (title, description) values (:title, :description)");

        $add->bindValue(':title', $title);
        $add->bindValue(':description', $description);

        if ($add->execute()) {
            header('LOCATION: ?c=home');
        }

    }

    public static function readServiceDB()
    {
        $select = Connect::getPDO()->prepare("SELECT * FROM ftk09_services");

        $select->execute();
        if ($select->execute()) {
            foreach ($datas = $select->fetchAll() as $data) { ?>
                <div class="services">
                    <h3 class="services-titre"><?= $data['title'] ?></h3>
                    <p class="services-paragraphe"><?= $data['description'] ?></p>
                    <form method="post" action="?c=home&id=<?=$data['id']?>">
                        <input type="submit" name="delete" id="delete" value="&#45">
                    </form>

                </div>
                <?php
                $_SESSION['service-id'] = $data;
            }

        }
    }

    public static function deleteService($id) {
        $delete = Connect::getPDO()->prepare("DELETE FROM ftk09_services WHERE id = '{$id}'");
        if ($delete->execute()) {
            header('LOCATION: ?c=home');
        }
    }
}

