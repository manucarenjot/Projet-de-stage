<?php
class AdminController extends AbstractController
{

    public function index()
    {
       $this->render('private/espace-admin');
    }
}