<?php

class ContactController extends AbstractController
{

    public function index()
    {
        $this->render('form/contact');
    }
}