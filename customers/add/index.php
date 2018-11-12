<?php

require_once '../../vendor/autoload.php';
require_once '../../global.php';
require_once '../../db.php';

$loader = new Twig_Loader_Filesystem('../../templates');
$twig = new Twig_Environment($loader);
$twig->addGlobal('root', $_SESSION['root']);

echo $twig->render('add_customer.html', array());

?>
