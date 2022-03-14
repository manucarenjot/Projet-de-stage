<?php
class AdminController extends AbstractController
{

    public function index()
    {
       $this->render('private/espace-admin');
    }

    public function logout()
    {
        $this->render('private/logout');
    }
    public function update()
    {
        $this->render('private/update-profil');
    }
    public function messages()
    {
        $this->render('private/message');
    }
    public function devis()
    {
        $this->render('private/devis');
    }



}