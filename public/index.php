<?php

use App\Routing\Router\Router;
use App\Controller\ErrorController\ErrorController;
session_start();

require __DIR__ . '/../require.php';

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Carrosserie Proissy</title>
</head>
<body>
<div class="menu">
    <a href="?c=home">| Acceuil |</a>
    <a href="?c=realisations">Realisation |</a>
    <a href="?c=demande-de-devis">Demande de devis |</a>
    <a href="?c=contact">Contact |</a>
    <a href="?c=espace-admin">Espace admin |</a>

</div>
<?php


if (isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
    $alerts = $_SESSION['alert'];
    unset($_SESSION['alert']);

    foreach ($alerts as $alert) {
        echo $alert;
    }
}

$page = isset($_GET['c']) ? Router::secureUrl($_GET['c']) : 'home';
$action = isset($_GET['a']) ? Router::secureUrl($_GET['a']) : 'index';


switch ($page) {
    case 'home':
        Router::route('HomeController');
        break;
    case 'update-service':
        Router::route('UpdateServiceController');
        break;
    case 'realisations':
        Router::route('RealisationController');
        break;
    case 'demande-de-devis':
        Router::route('DevisController');
        break;
    case 'contact':
        Router::route('ContactController');
        break;
    case 'espace-admin':
        Router::route('AdminController', $action);
        break;
    case 'connect':
        Router::route('ConnectController', $action);
        break;
    default:
        ErrorController::error404($page);
}


?>
<div class="footer">
    <a href="?c=home">| Acceuil |</a>
    <a href="?c=realisations">Realisation |</a>
    <a href="?c=demande-de-devis">Demande de devis |</a>
    <a href="?c=contact">Contact |</a>
    <a href="?c=espace-admin">Espace admin |</a>
    <br>
    <p>Copyright © 2012 − Carrosserie Proisy</p>
</div>
<script src="https://kit.fontawesome.com/d8438e7f2f.js" crossorigin="anonymous"></script>
</body>
</html>


