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

            $alert = [];


            if ($_POST['password'] !== $_POST['password-repeat']) {
                $alert[] = 'Les mots de passes ne sont pas identiques';
            }

            if(count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=espace-admin&a=update-profil');
            }
            else {
                $username = trim(strip_tags($_POST['username']));
                $mail = trim(strip_tags(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)));
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $id = $_SESSION['admin']['id'];

                AdminManager::changeAdminData($username, $mail, $password, $id);
            }


        }
    }
    public function messages()
    {MessagerieManager::getMessage();
        $this->render('private/message');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            MessagerieManager::getMessageById($id);
        }

        if ($this->getDelete()) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                MessagerieManager::deleteMessage($id);
            }
        }

    }

    public function deleteMessage() {
        $this->render('private/message');

    }

    public function devis()
    {
        $this->render('private/devis');
    }

    public function updateData() {



    }





}