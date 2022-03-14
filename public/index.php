<?php
require __DIR__ . '/../require.php';

$page = isset($_GET['c']) ? ($_GET['c']) : 'home';
$method = isset($_GET['a']) ? ($_GET['a']) : 'index';