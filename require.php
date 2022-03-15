<?php

require __DIR__ . '/Routing/Router.php';

require __DIR__ . '/Config.php';
require __DIR__ . '/Connect.php';

require __DIR__ . '/Models/entity/AbstractEntity.php';
require __DIR__ . '/Models/entity/Admin.php';


require __DIR__ . '/Models/manager/AdminManager.php';
require __DIR__ . '/Models/manager/ImageManager.php';
require __DIR__ . '/Models/manager/MessagerieManager.php';

require __DIR__ . '/Controller/AbstractController.php';
require __DIR__ . '/Controller/AdminController.php';
require __DIR__ . '/Controller/MessagerieController.php';
require __DIR__ . '/Controller/ImageController.php';
require __DIR__ . '/Controller/HomeController.php';
require __DIR__ . '/Controller/RealisationController.php';
require __DIR__ . '/Controller/DevisController.php';
require __DIR__ . '/Controller/ContactController.php';
require __DIR__ . '/Controller/ConnectController.php';
require __DIR__ . '/Controller/ErrorController.php';

