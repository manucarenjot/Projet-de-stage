<?php

use App\Routing\Router\Router;

require __DIR__ . '/../require.php';

$page = isset($_GET['c']) ? Router::secureUrl($_GET['c']) : 'home';
$method = isset($_GET['a']) ? ($_GET['a']) : 'index';


switch ($page) {
    case 'home':
        Router::route('HomeController');
        break;

}