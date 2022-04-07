<h1>Réalisations</h1>

<?php

function getRandomName(string $regularName)
{
    $infos = pathinfo($regularName);
    try {
        $bytes = random_bytes(15);
    } catch (Exception $e) {
        $bytes = openssl_random_pseudo_bytes(15);
    }
    return bin2hex($bytes) . '.' . $infos['extension'];
}

?>
<div class="addPicture">
    <form action="?c=realisations" method="post" enctype="multipart/form-data">
        <input type="file" name="fichierUtilisateur" value="+" id="id-fichier" style="display: "/><br>
        <input type="submit" value="Ajouter"><br>
    </form>
</div>


<div class="gallerie">
    <?php

    $files = glob('uploads/*');
    foreach ($files as $filename) {
        echo '<div>
<form method="post" action="?c=realisations">
<input type="text" name="filename" value="' . $filename . '" style="display: none">
<input type="submit" name="deletePicture" value="❌" title="Supprimer">
</form>
<img class="gallerieImage" src="' . $filename . ' "   </img></div>';
    }
    ?>
</div>
<?php
if (isset($_FILES["fichierUtilisateur"])) {
    $alert = [];
    $allowedMimeTypes = ['text/plain', 'image/jpeg', 'image/png'];
    if (in_array($_FILES['fichierUtilisateur']['type'], $allowedMimeTypes)) {
        if ($_FILES['fichierUtilisateur']['error'] === 0) {
            $tmp_name = $_FILES['fichierUtilisateur']["tmp_name"];

            $name = getRandomName($_FILES['fichierUtilisateur']["name"]);
            if (!is_dir('uploads')) {
                mkdir('uploads', '0755');
            }
            move_uploaded_file($tmp_name, 'uploads/' . $name);

            $alert[] = '<p class="alert-succes" style="font-size: 1em; width: 100%">upload réussi !</p><br>';
            header('LOCATION: ?c=realisations');
        } else {
            $alert[] = '<p class="alert-error" style="font-size: 1em; width: 100%">Une erreur s\'est produite lors de l\'upload du fichier!</p>';
        }
    } else {
        $alert[] = '<br><p class="alert-error" style="font-size: 1em; width: 100%">le type du fichier n\'est pas autorisé !</p>';

    }
    if (count($alert) > 0) {
        $_SESSION['alert'] = $alert;
        header('LOCATION: ?c=realisations');
    }
}


if (isset($_SESSION['admin'])) {


    ?>


    <?php
}