<?php

use App\Connect\Connect;

class ServicesManager
{
    public static function addService(string $title, string $description) {
        $add = Connect::getPDO()->prepare("INSERT INTO ftk09_services (title, description) values ('{$title}', '{$description}')");

        $add->execute();

    }
}
