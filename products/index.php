<?php

require_once '../global.php';

if (isset($_GET['id'])) {
    $product_id = htmlspecialchars($_GET['id']);
    $seller_id = htmlspecialchars($_GET['seller_id']);

    $sql = "SELECT * FROM product_view WHERE product_id = $product_id AND seller_id = $seller_id";

    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    $product['category_color'] = $_CATEGORY_COLORS[(int)substr((string)crc32($product['category']), 0, 1) % count($_CATEGORY_COLORS)];

    $current_customer_rating = null;
    if (isset($_SESSION['current_customer_id']) && isset($_SESSION['current_customer_seller_id'])) {
        $sql = "SELECT rating FROM product_rating WHERE customer_id = ".$_SESSION['current_customer_id']." AND customer_seller_id = ".$_SESSION['current_customer_seller_id']." AND product_id = $product_id AND product_seller_id = $seller_id";
        $result = mysqli_query($conn, $sql);
        $current_customer_rating = mysqli_fetch_assoc($result)['rating'];
    }

    if ($seller_id == 3) {
        $sql = "SELECT * FROM northwind.products WHERE id = $product_id";
        $result = mysqli_query($conn, $sql);
        $northwind_product = mysqli_fetch_assoc($result);
    } else if ($seller_id == 4) {
        $sql = "SELECT * FROM sakila.film WHERE film_id = $product_id";
        $result = mysqli_query($conn, $sql);
        $sakila_product = mysqli_fetch_assoc($result);
    }

    $vars = array('product' => $product, 'current_customer_rating' => $current_customer_rating);

    if (isset($northwind_product)) { $vars['northwind_product'] = $northwind_product; }
    if (isset($sakila_product)) { $vars['sakila_product'] = $sakila_product; }

    echo $twig->render('product.html', $vars);
} else {
    if (isset($_GET['page'])) {
        $page = htmlspecialchars($_GET['page']);
    } else {
        $page = 1;
    }
    
    $offset = $_ITEMS_PER_PAGE * ($page - 1);
    
    if (isset($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
    }
    
    $sql = "SELECT * FROM product WHERE is_deleted = 0";
    if (isset($search) && $search) { $sql = $sql." AND name LIKE '%$search%'"; }
    $sql = $sql." ORDER BY name ASC LIMIT $_ITEMS_PER_PAGE OFFSET $offset";

    $result = mysqli_query($conn, $sql);
    $products = array();
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($products, $row);
            }
        }
    }
    
    $vars = array('products' => $products, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE);
    if (isset($search) && $search) { $vars['search'] = $search; }
    
    echo $twig->render('products.html', $vars);
}

?>
