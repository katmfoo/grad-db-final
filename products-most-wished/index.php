<?php

require_once '../global.php';

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = 1;
}

$_ITEMS_PER_PAGE = 4;

$offset = $_ITEMS_PER_PAGE * ($page - 1);

if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
}

/* Selects the top 3 products that have been wished for the most from each product category,
   does not include categories that no one has wished for a product with that category */

$sql = "SELECT category, CONCAT('[', SUBSTRING_INDEX(GROUP_CONCAT(CONCAT('[', product_id, ', ', seller_id, ']') ORDER BY times_wished_for DESC), ',', 6), ']') AS most_wished_for_product_ids FROM product_view WHERE times_wished_for != 0 GROUP BY category LIMIT $_ITEMS_PER_PAGE OFFSET $offset";
$result = mysqli_query($conn, $sql);
$categories = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($categories, $row);
    }
}

foreach ($categories as &$category) {
    $category['most_wished_for_product_ids'] = json_decode($category['most_wished_for_product_ids']);
    $category['products'] = array();
    foreach ($category['most_wished_for_product_ids'] as $product_info) {
        $sql = "SELECT * FROM product_view WHERE product_id = ".$product_info[0]." AND seller_id = ".$product_info[1];
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
        $product['category_color'] = $_CATEGORY_COLORS[(int)substr((string)crc32($product['category']), 0, 1) % count($_CATEGORY_COLORS)];
        array_push($category['products'], $product);
    }
}

echo $twig->render('products_most_wished.html', $vars = array('categories' => $categories, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE));

?>
