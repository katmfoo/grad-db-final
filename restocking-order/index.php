<?php

require_once '../global.php';

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = 1;
}

$offset = $_ITEMS_PER_PAGE * ($page - 1);

$sql = "SELECT * FROM product WHERE is_deleted = 0 AND current_stock < minimum_stock ORDER BY current_stock / minimum_stock ASC LIMIT $_ITEMS_PER_PAGE OFFSET $offset";
$result = mysqli_query($conn, $sql);
$products = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($products, $row);
    }
}

echo $twig->render('restocking_order.html', array('products' => $products, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE));

?>
