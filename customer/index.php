<?php

require_once '../vendor/autoload.php';
require_once '../db.php';

$customer_id = htmlspecialchars($_GET["id"]);

$sql = "SELECT * FROM customer WHERE customer_id = ".$customer_id;
$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($result);

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader);

echo $twig->render('customer.html', array('customer' => $customer));

?>
