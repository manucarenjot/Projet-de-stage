<?php
if(isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
        $alerts = $_SESSION['alert'];
        unset($_SESSION['alert']);

        foreach($alerts as $alert) { ?>
            <div class="alert alert-error"><strong><?= $alert ?></strong></div> <?php
        }
    }
?>

<br><a href="?c=espace-admin">ᐊ=</a><h2>Modification du profil</h2>

<form method="post" action="?c=espace-admin&a=update-profil">
    <label for="username">Changer de nom d'utilisateur :</label>
    <br>
    <input type="text" name="username" id="username">
    <br>
    <label for="mail">Changer d'adresse e-mail :</label>
    <br>
    <input type="email" name="mail" id="mail">
    <br>
    <label for="password">Changer de mot de passe :</label>
    <br>
    <input type="password" name="password" id="password">
    <br>
    <label for="password-repeat">Rèpètez le mot de passe :</label>
    <br>
    <input type="password" name="password-repeat" id="password-repeat">
    <br>
    <input type="submit" name="send" id="send">
</form>


