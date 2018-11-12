<?php

require_once 'vendor/autoload.php';

$_ROOT = '/grad-db-final';

if (!session_id()) session_start();

$loader = new Twig_Loader_Filesystem(__DIR__.'/templates/');
$twig = new Twig_Environment($loader);
$twig->addGlobal('root', $_ROOT);

if (isset($_SESSION['flash'])) {
    $twig->addGlobal('flash', $_SESSION['flash']);
    unset($_SESSION['flash']);
}

?>