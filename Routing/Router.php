<?php
namespace App\Routing\Router;


class Router
{

    public static function route(string $controller, $action = null) {
        $controller = new $controller;
        $controller->index();
        switch ($action) {
            case '';

            break;
        }
    }


    public static function secureUrl(?string $param): ?string
    {
        if(null === $param) {
            return null;
        }

        $param = strip_tags($param);
        $param =  trim($param);
        return strtolower($param);
    }
}