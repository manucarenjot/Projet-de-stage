<?php
$_SESSION['captcha'] = mt_rand(1000, 9999);
?>

<h1>Demande de devis</h1>

<form method="post" action="">
    <div>
        <label for="phone-number">Numéro de téléphone :</label>
        <input type="text" name="phone-number" id="phone-number">
    </div>
    <div>
        <label for="mail">Numéro de téléphone :</label>
        <input type="email" name="mail" id="mail">
    </div>
    <div>
        <label for="carteGrise">Photo carte grise</label>
        <input type="file" name="carteGrise" id="carteGrise">
    </div>
    <div>
        <label for="photoVoiture">Photo de la partie du véhicule à refaire	</label>
        <input type="file" name="photoVoiture" id="photoVoiture">
    </div>
    <div>
        <label for="captchaImg">Entrer le texte du captcha :</label>
        <input name="captcha" type="text"><br>
        <img src="/captcha.php" alt="captcha de vérification"/>
    </div>
</form>
