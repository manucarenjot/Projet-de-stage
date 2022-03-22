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
<?php

if (isset($_FILES["carteGrise"])) {
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
            foreach ($_FILES['fichierUtilisateur'] as $key => $value) {
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

<h1>Demande de devis</h1>

<form method="post" action="?c=demande-de-devis">
    <table>
        <div>
            <tr>
                <td>
                    <label for="phone-number">Numéro de téléphone :</label><br>
                </td>
                <td>
                    <input type="text" name="phone-number" id="phone-number"><br>
                </td>
            </tr>
        </div>
        <div>
            <tr>
                <td>
                    <label for="mail">E-mail :</label><br>
                </td>
                <td>
                    <input type="email" name="mail" id="mail"><br>
                </td>
            </tr>
        </div>
        <div>
            <tr>
                <td>
                    <label for="carteGrise">Photo carte grise</label><br>
                </td>
                <td>
                    <input type="file" name="carteGrise" id="carteGrise" VALUE="<?=$name?>"><br>
                </td>
            </tr>
        </div>
        <div>
            <tr>
                <td>
                    <label for="photoVoiture">Photo de la partie du véhicule à refaire </label><br>
                </td>
                <td>
                    <input type="file" name="photoVoiture" id="photoVoiture"><br>
                </td>
            </tr>

        </div>
        <div>
            <tr>
                <td>
                    <label for="captcha">Entrer le texte du captcha :</label><br>
                </td>
                <td>
                    <input name="captcha" type="text" id="captcha"><br>
                </td>
                <td>
                    <label for="captchaImg">Captcha :</label><br>
                </td>
                <td>
                    <img src="/captcha.php" alt="captcha de vérification"/>
                </td>
            </tr>
        </div>
        <tr>
            <td><input type="submit" name="send"></td>
        </tr>
    </table>
</form>
<?php

