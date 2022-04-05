<?php

function getRandomName(string $regularName) {
    $infos = pathinfo($regularName);
    try {
        $bytes = random_bytes(15);
    }
    catch (Exception $e) {
        $bytes = openssl_random_pseudo_bytes(15);
    }
    return bin2hex($bytes) . '.' . $infos['extension'];
}

?>

<h1>Demande de devis</h1>

<form method="post" action="?c=demande-de-devis" enctype="multipart/form-data">

        <div>

                    <label for="phone-number">Numéro de téléphone :</label><br>

                    <input type="text" name="phone-number" id="phone-number"><br>

        </div>
        <div>

                    <label for="mail">E-mail :</label><br>

                    <input type="email" name="mail" id="mail"><br>


        </div>
        <div>

                    <label for="carteGrise">Photo carte grise</label><br>

                    <input type="file" name="carteGrise" id="carteGrise" VALUE="<?= $name ?>"><br>

                <?php
                if (isset($_FILES['carteGrise'])) {
                    $allowedMimeTypes = ['text/plain', 'image/jpeg', 'image/png'];
                    if (in_array($_FILES['carteGrise']['type'], $allowedMimeTypes)) {
                        if ($_FILES['carteGrise']['error'] === 0) {
                            $tmp_name = $_FILES['carteGrise']["tmp_name"];

                            $name = getRandomName($_FILES['carteGrise']["name"]);
                            if (!is_dir('uploads')) {
                                mkdir('uploads', '0755');
                            }
                            move_uploaded_file($tmp_name, 'uploads/' . $name);

                            echo '<p class="success">upload réussi !</p><br>';
                            echo $name . '<br>';
                            foreach ($_FILES['carteGrise'] as $key => $value) {
                                echo "$key => $value <br><br>";
                            }
                        } else {
                            echo '<p>Une erreur s\'est produite lors de l\'upload du fichier!</p>';
                        }
                    } else {
                        echo '<br><p>le type du fichier n\'est pas autorisé !</p>';
                    }
                }
                ?>

        </div>
        <div>

                    <label for="photoVoiture">Photo de la partie du véhicule à refaire </label><br>

                    <input type="file" name="photoVoiture" id="photoVoiture"><br>
            <?php
            if (isset($_FILES['photoVoiture'])) {
                $allowedMimeTypes = ['text/plain', 'image/jpeg', 'image/png'];
                if (in_array($_FILES['photoVoiture']['type'], $allowedMimeTypes)) {
                    if ($_FILES['photoVoiture']['error'] === 0) {
                        $tmp_name = $_FILES['photoVoiture']["tmp_name"];

                        $name = getRandomName($_FILES['photoVoiture']["name"]);
                        if (!is_dir('uploads')) {
                            mkdir('uploads', '0755');
                        }
                        move_uploaded_file($tmp_name, 'uploads/' . $name);

                        echo '<p class="success">upload réussi !</p><br>';
                        echo $name . '<br>';
                        foreach ($_FILES['photoVoiture'] as $key => $value) {
                            echo "$key => $value <br><br>";
                        }
                    } else {
                        echo '<p>Une erreur s\'est produite lors de l\'upload du fichier!</p>';
                    }
                } else {
                    echo '<br><p>le type du fichier n\'est pas autorisé !</p>';
                }
            }
            ?>

        </div>
        <div>

                    <label for="captcha">Entrer le texte du captcha :</label><br>

                    <input name="captcha" type="text" id="captcha"><br>

                    <label for="captchaImg">Captcha :</label><br>

                    <img src="/captcha.php" alt="captcha de vérification"/>

        </div>

            <td><input type="submit" name="send"></td>

</form>
