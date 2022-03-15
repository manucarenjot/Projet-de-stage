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
        if ($this->getPost()) {
            $username = trim(strip_tags($_POST['username']));
            $mail = trim(strip_tags(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)));
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $id = $_SESSION['admin']['id'];

            echo $username . ' ' . $mail . ' ' . $password . ' ' . $id;
            AdminManager::changeAdminData($username, $mail, $password, $id);
            echo 'post ok';
        }
    }
    public function messages()
    {
        $this->render('private/message');
    }
    public function devis()
    {
        $this->render('private/devis');
    }

    public function updateData() {



    }





}