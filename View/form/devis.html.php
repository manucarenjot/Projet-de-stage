<?php
$_SESSION['captcha'] = mt_rand(1000, 9999);
?>

<h1>Demande de devis</h1>

<form method="post" action="">
    <div>
        <label for="phone-number">Numéro de téléphone :</label>
        <input type="text" name="phone-number" id="phone-number">
    </div>
    <label for="mail">Numéro de téléphone :</label>
    <input type="email" name="mail" id="mail">
    <div>
        <label for="captchaImg">Entrer le texte dans l'image</label>
        <input name="captcha" type="text">
        <img src="/captcha.php" style="vertical-align: middle;"/>
    </div>
</form>
