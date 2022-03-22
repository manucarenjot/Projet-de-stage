<?php

abstract class AbstractController
{

    abstract public function index();

    public function render($page)
    {
        ob_start();
        require __DIR__ . '/../View/' . $page . '.html.php';
    }


    public function notSessionActivate()
    {
        if (!isset($_SESSION['admin'])) {
            header('LOCATION: ?c=connect&a=login');
        }
    }

    public function getPost(): bool {
        return isset($_POST['send']);
    }
    public function getDelete(): bool {
        return isset($_POST['delete']);
    }

    public function verifyUpload($inputName) {
        if (isset($_FILES[$inputName])) {
            $allowedMimeTypes = ['text/plain', 'image/jpeg', 'image/png'];
            if (in_array($_FILES[$inputName]['type'], $allowedMimeTypes)) {
                if ($_FILES[$inputName]['error'] === 0) {
                    $tmp_name = $_FILES[$inputName]["tmp_name"];

                    $name = getRandomName($_FILES[$inputName]["name"]);
                    if (!is_dir('uploads')) {
                        mkdir('uploads', '0755');
                    }
                    move_uploaded_file($tmp_name, 'uploads/' . $name);

                    echo '<p class="success">upload réussi !</p><br>';
                    echo $name . '<br>';
                    foreach ($_FILES[$inputName] as $key => $value) {
                        echo "$key => $value <br><br>";
                    }
                } else {
                    echo '<p>Une erreur s\'est produite lors de l\'upload du fichier!</p>';
                }
            } else {
                echo '<br><p>le type du fichier n\'est pas autorisé !</p>';
            }
        }

    }
}