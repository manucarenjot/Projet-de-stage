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
    public function devis() {
        $this->render('form/devis');
    }
    public function contact() {
        $this->render('form/contact');
    }
    public function admin() {
        $this->render('private/espace-admin');
    }
}