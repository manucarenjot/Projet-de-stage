<h1>Réalisations</h1>

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

$files = glob('uploads/*');
foreach($files as $filename){echo '<img class="gallerieImage" src="'. $filename . ' " height="250"</img>';}

if (isset($_FILES["fichierUtilisateur"])) {
    $allowedMimeTypes = ['text/plain', 'image/jpeg', 'image/png'];
    if (in_array($_FILES['fichierUtilisateur']['type'], $allowedMimeTypes)) {
        if ($_FILES['fichierUtilisateur']['error'] === 0) {
            $tmp_name = $_FILES['fichierUtilisateur']["tmp_name"];

            $name = getRandomName($_FILES['fichierUtilisateur']["name"]);
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
        echo '<br><p>le type du fichier n\'est pas autorisé !</p><style> p { color: red;
}

.success {
color: limegreen;
}</style>';
    }
}

?>
<form action="?c=realisations" method="post" enctype="multipart/form-data">
    <label for="id-fichier" id="upfile1" style="cursor:pointer"><i class="fas fa-plus"></i></label>
    <input type="file" name="fichierUtilisateur" id="id-fichier" style="display: none"/><br>
    <input type="submit" value="Send"><br>
</form>
