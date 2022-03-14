<?php

class Router
{

    public function route(string $controller, $action = null) {
        $controller = new $controller;
    }
}