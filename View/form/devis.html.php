<?php


if (isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
    $alerts = $_SESSION['alert'];
    unset($_SESSION['alert']);

    foreach ($alerts as $alert) {
        echo $alert;
    }
}

function getRandomName(string $regularName)
{
    $infos = pathinfo($regularName);
    try {
        $bytes = random_bytes(15);
    } catch (Exception $e) {
        $bytes = openssl_random_pseudo_bytes(15);
    }
    return bin2hex($bytes) . '.' . $infos['extension'];
}


?>

    <h1>Demande de devis</h1>
    <div>
        <form method="post" action="?c=demande-de-devis" enctype="multipart/form-data" class="devis">

            <div>

                <label for="phone-number">Numéro de téléphone :</label><br>

                <input type="text" name="phone-number" id="phone-number"><br>

            </div>
            <div>

                <label for="mail">E-mail :</label><br>

                <input type="email" name="mail" id="mail"><br>


            </div>
            <div>

                <label for="carteGrise">Photo carte grise (format autorisé 'jpg/png')</label><br>

                <input type="file" name="carteGrise" id="carteGrise"><br>

                <?php
                if (isset($_FILES['carteGrise'])) {
                    $allowedMimeTypes = ['text/plain', 'image/jpeg', 'image/png'];
                    if (in_array($_FILES['carteGrise']['type'], $allowedMimeTypes)) {
                        if ($_FILES['carteGrise']['error'] === 0) {
                            $tmp_name = $_FILES['carteGrise']["tmp_name"];

                            $name = getRandomName($_FILES['carteGrise']["name"]);
                            if (!is_dir('devis')) {
                                mkdir('devis', '0755');
                            }
                            move_uploaded_file($tmp_name, 'devis/' . $name);

                            echo '<div class="alert-succes" style="font-size: 1em; width: 100%">upload réussi !</div><br>';
                            $_SESSION['carteGrise'] = $name;

                        } else {
                            echo '<div class="alert-error" style="font-size: 1em; width: 100%">Une erreur s\'est produite lors de l\'upload du fichier de la carte grise!</div><br>';
                        }
                    } else {
                        echo '<br><div class="alert-error" style="font-size: 1em; width: 100%">le type du fichier de la carte grise n\'est pas autorisé !</div><br>';
                    }
                }
                ?>

            </div>
            <div>

                <label for="photoVoiture">Photo de la partie du véhicule à refaire (format autorisé 'jpg/png')</label><br>

                <input type="file" name="photoVoiture" id="photoVoiture"><br>
                <?php
                if (isset($_FILES['photoVoiture'])) {
                    $allowedMimeTypes = ['text/plain', 'image/jpeg', 'image/png'];
                    if (in_array($_FILES['photoVoiture']['type'], $allowedMimeTypes)) {
                        if ($_FILES['photoVoiture']['error'] === 0) {
                            $tmp_name = $_FILES['photoVoiture']["tmp_name"];

                            $name = getRandomName($_FILES['photoVoiture']["name"]);
                            if (!is_dir('devis')) {
                                mkdir('devis', '0755');
                            }
                            move_uploaded_file($tmp_name, 'devis/' . $name);

                            echo '<div class="alert-succes" style="font-size: 1em; width: 100%">upload réussi !</div><br>';
                            $_SESSION['photoVoiture'] = $name;
                        } else {
                            echo '<div class="alert-error" style="font-size: 1em; width: 100%">Une erreur s\'est produite lors de l\'upload du fichier de la photo de la voiture!</div><br>';
                        }
                    } else {
                        echo '<br><div class="alert-error" style="font-size: 1em; width: 100%">le type du fichier de la photo de la voiture n\'est pas autorisé !</div><br>';
                    }
                }
                ?>

            </div>
            <div>

                <label for="captcha">Entrer le texte du captcha :</label><br>

                <input name="captcha" type="text" id="captcha"><br>

                <label for="captchaImg">Captcha :</label><br>

                <img src="captcha.php" alt="captcha de vérification"/>

            </div>

            <td><input type="submit" name="send"></td>

        </form>
    </div>
<?php
