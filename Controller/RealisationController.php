<?php


class RealisationController extends AbstractController
{

    public function index()
    {
        $this->render('realisation/galerie');
        if (isset($_POST['deletePicture'])) {
            $namePicture = $_POST['filename'];
            $this->deletePicture($namePicture);
            header('LOCATION: ?c=realisations');
        }
    }
}