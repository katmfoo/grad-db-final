<?php

require_once '../vendor/autoload.php';
require_once '../global.php';
require_once '../db.php';

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader);
$twig->addGlobal('root', $_SESSION['root']);

$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);
$customers = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($customers, $row);
    }
}

echo $twig->render('customers.html', array('customers' => $customers));

?>
