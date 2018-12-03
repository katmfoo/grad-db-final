<?php

require_once '../global.php';

if (!isset($_SESSION['current_customer_id']) || !isset($_SESSION['current_customer_seller_id'])) {
    header("Location: $_ROOT/");
    return;
}

$customer_id = $_SESSION['current_customer_id'];
$customer_seller_id = $_SESSION['current_customer_seller_id'];

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = 1;
}

$offset = $_ITEMS_PER_PAGE * ($page - 1);

/* Suggested products, selects all products that share a category with either an item the customer has
   wished for or an item that the customer has previously purchased. Makes sure to not return the products
   that the customer has already either wished for or purchased. Returned products are sorted by the
   weighted rating of that product so higher rated products are displayed first. */

$sql = "SELECT * FROM (
            SELECT * FROM product_view WHERE category IN (
	            SELECT DISTINCT category
                    FROM wishlist
                    JOIN product_view ON wishlist.product_id = product_view.product_id AND wishlist.product_seller_id = product_view.seller_id
                    WHERE category IS NOT NULL AND customer_id = $customer_id AND customer_seller_id = $customer_seller_id
            ) AND (product_id, seller_id) NOT IN (
 	            SELECT product_id, product_seller_id
                    FROM wishlist
                    WHERE customer_id = $customer_id AND customer_seller_id = $customer_seller_id
            )
        UNION
            SELECT * FROM product_view WHERE category IN (
	            SELECT DISTINCT category
                    FROM order_product
		            JOIN product_view ON order_product.product_id = product_view.product_id AND order_product.product_seller_id = product_view.seller_id
		            JOIN richealp7.order ON order_product.order_id = richealp7.order.order_id
		            WHERE category IS NOT NULL AND customer_id = $customer_id AND customer_seller_id = $customer_seller_id
            ) AND (product_id, seller_id) NOT IN (
                SELECT product_id, product_seller_id FROM order_product
                    JOIN richealp7.order ON order_product.order_id = richealp7.order.order_id
                    WHERE customer_id = $customer_id AND customer_seller_id = $customer_seller_id
                )
        ) p
        ORDER BY rating_weighted DESC
        LIMIT $_ITEMS_PER_PAGE OFFSET $offset";

$result = mysqli_query($conn, $sql);
$products = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($products, $row);
    }
}

$vars = array('products' => $products, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE);
if (isset($search) && $search) { $vars['search'] = $search; }

echo $twig->render('suggested_products.html', $vars);

?>
