<?php

require_once '../global.php';

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = 1;
}

$offset = $_ITEMS_PER_PAGE * ($page - 1);

/* Selects all products that either have not been purchased at all (appears on the top of the list) or
   products that haven't been purchased in over a month, with products having not been purchased for longer
   appearing first */

$sql = "SELECT *, (
	        SELECT creation_datetime FROM order_product WHERE product_id = product.product_id AND product_seller_id = 1 ORDER BY creation_datetime DESC LIMIT 1
        ) as last_purchased_date
        FROM richealp7.product
        WHERE is_deleted = 0
        HAVING last_purchased_date < DATE_SUB(NOW(), INTERVAL 1 MONTH) OR last_purchased_date IS NULL
        ORDER BY last_purchased_date ASC, creation_datetime ASC
        LIMIT $_ITEMS_PER_PAGE OFFSET $offset";
$result = mysqli_query($conn, $sql);
$products = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($products, $row);
    }
}

echo $twig->render('products_not_selling_well.html', array('products' => $products, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE));

?>
