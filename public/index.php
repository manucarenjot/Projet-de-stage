<?php
use App\Routing\Router\Router;
use App\Controller\ErrorController\ErrorController;



require __DIR__ . '/../require.php';

$page = isset($_GET['c']) ? Router::secureUrl($_GET['c']) : 'home';
$action = isset($_GET['a']) ? Router::secureUrl($_GET['a']) : 'index';


switch ($page) {
    case 'home':
        Router::route('HomeController', $action);
    break;

    default:
        ErrorController::error404($page);
}