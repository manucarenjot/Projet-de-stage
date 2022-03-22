<?php
$_SESSION['captcha'] = mt_rand(1000, 9999);
?>

<h1>Demande de devis</h1>

<form method="post" action="">
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
                    <label for="mail">Numéro de téléphone :</label><br>
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
                    <input type="file" name="carteGrise" id="carteGrise"><br>
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
