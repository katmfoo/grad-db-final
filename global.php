<?php

require_once 'vendor/autoload.php';

$_ROOT = '/grad-db-final';
$_ITEMS_PER_PAGE = 12;
$_CATEGORY_COLORS = array('primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark');

if (!session_id()) session_start();

$loader = new Twig_Loader_Filesystem(__DIR__.'/templates/');
$twig = new Twig_Environment($loader);
$twig->addGlobal('root', $_ROOT);

if (isset($_SESSION['flash'])) {
    $twig->addGlobal('flash', $_SESSION['flash']);
    unset($_SESSION['flash']);
}

?>