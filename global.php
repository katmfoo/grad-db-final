<?php

require_once 'vendor/autoload.php';
require_once 'db.php';

$_ROOT = 'http://elvis.rowan.edu/~richealp7/grad-db-final';
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

if (isset($_SESSION['flash_error'])) {
    $twig->addGlobal('flash_error', $_SESSION['flash_error']);
    unset($_SESSION['flash_error']);
}

if (isset($_SESSION['current_customer_id']) && isset($_SESSION['current_customer_seller_id'])) {
    $sql = "SELECT CONCAT(first_name, ' ', last_name) as name FROM customer_view WHERE customer_id = ".$_SESSION['current_customer_id']." AND seller_id = ".$_SESSION['current_customer_seller_id'];
    $result = mysqli_query($conn, $sql);
    $current_customer = mysqli_fetch_assoc($result);
    $twig->addGlobal('current_customer', array('id' => $_SESSION['current_customer_id'], 'name' => $current_customer['name'], 'seller_id' => $_SESSION['current_customer_seller_id']));

    $sql = "SELECT COALESCE(SUM(quantity), 0) as num_cart_items FROM cart_item WHERE customer_id = ".$_SESSION['current_customer_id']." AND customer_seller_id = ".$_SESSION['current_customer_seller_id'];
    $result = mysqli_query($conn, $sql);
    $num_cart_items = mysqli_fetch_assoc($result)['num_cart_items'];
    $twig->addGlobal('num_cart_items', $num_cart_items);
}

$link_back = urlencode("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$twig->addGlobal('link_back', $link_back);

?>
