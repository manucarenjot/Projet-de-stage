<?php
$_SESSION['captcha'] = mt_rand(1000, 9999);
?>

<h1>Demande de devis</h1>

<form method="post" action="">
    <div>
        <label for="phone-number">Numéro de téléphone :</label><br>
        <input type="text" name="phone-number" id="phone-number"><br>
    </div>
    <div>
        <label for="mail">Numéro de téléphone :</label><br>
        <input type="email" name="mail" id="mail"><br>
    </div>
    <div>
        <label for="carteGrise">Photo carte grise</label><br>
        <input type="file" name="carteGrise" id="carteGrise"><br>
    </div>
    <div>
        <label for="photoVoiture">Photo de la partie du véhicule à refaire	</label><br>
        <input type="file" name="photoVoiture" id="photoVoiture"><br>
    </div>
    <div>
        <label for="captcha">Entrer le texte du captcha :</label><br>
        <input name="captcha" type="text" id="captcha"><br>
        <img src="/captcha.php" alt="captcha de vérification"/>
        <div><i class="fa-solid fa-arrows-rotate"></i></div>
    </div>
    <input type="submit" name="send">
</form>
