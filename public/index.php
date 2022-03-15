<?php

use App\Routing\Router\Router;
use App\Controller\ErrorController\ErrorController;

session_start();

if(isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
    $alerts = $_SESSION['alert'];
    unset($_SESSION['alert']);

    foreach($alerts as $alert) { ?>
        <div class="alert alert-error"><strong><?= $alert ?></strong></div> <?php
    }
}



require __DIR__ . '/../require.php';

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrosserie Proissy</title>
</head>
<body>
<a href="?c=home">| Acceuil |</a>
<a href="?c=realisations">Realisation |</a>
<a href="?c=demande-de-devis">Demande de devis |</a>
<a href="?c=contact">Contact |</a>
<a href="?c=espace-admin">Espace admin |</a>
</body>
</html>
<?php

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

