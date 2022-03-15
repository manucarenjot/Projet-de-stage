<?php


AbstractController::notSessionActivate();
?>

<h1>Espace d'administration</h1>

<h3>Bonjour <?=$_SESSION['admin']['username']?></h3>
<a href="?c=espace-admin&a=messages">Messages</a>
<a href="?c=espace-admin&a=devis">Devis</a>
<a href="?c=espace-admin&a=update-profil">Modifier le profil</a>
<a href="?c=espace-admin&a=logout">Logout</a>