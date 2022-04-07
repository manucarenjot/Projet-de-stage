<?php
AbstractController::notSessionActivate();

if (isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
    $alerts = $_SESSION['alert'];
    unset($_SESSION['alert']);

    foreach ($alerts as $alert) {
        echo $alert;
    }
}
?>

<h1>Espace d'administration</h1>


<h3>Bonjour <?= $_SESSION['admin']['username'] ?></h3>
<div class="menu-admin">
    <a href="?c=espace-admin&a=messages">| Messages |</a>
    <a href="?c=espace-admin&a=devis">Devis |</a>
    <a href="?c=espace-admin&a=update-profil">Modifier le profil |</a>
    <a href="?c=espace-admin&a=logout">Logout |</a>
</div>