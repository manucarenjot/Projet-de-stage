<?php


class HomeController extends AbstractController

{


    public function index()
    {
        $this->render('public/home');
    }

    public function realisation() {
        $this->render('realisation/galerie');
    }
}