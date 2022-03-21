<?php

?>

<br><a href="?c=espace-admin">ᐊ=</a>
<h2>Modification du profil</h2>

<form method="post" action="?c=espace-admin&a=update-profil">
    <label for="username">Nouveau nom d'utilisateur :</label>
    <br>
    <input type="text" name="username" id="username">
    <br>
    <label for="mail">Nouvelle adresse e-mail :</label>
    <br>
    <input type="email" name="mail" id="mail">
    <br>
    <label for="password">Nouveau de mot de passe :</label>
    <br>
    <input type="password" name="password" id="password">
    <br>
    <label for="password-repeat">Rèpètez le nouveau mot de passe :</label>
    <br>
    <input type="password" name="password-repeat" id="password-repeat">
    <br>
    <input type="submit" name="send" id="send">
</form>


