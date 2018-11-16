<?php

require_once '../global.php';
require_once '../db.php';

if (isset($_GET['id'])) {
    $product_id = htmlspecialchars($_GET['id']);
    $seller_id = htmlspecialchars($_GET['seller_id']);

    $sql = "SELECT * FROM product_view WHERE product_id = ".$product_id." AND seller_id = '".$seller_id."'";

    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    $categories = json_decode("[".$product['categories']."]");
    $product['categories'] = array();

    foreach ($categories as $category_name) {
        $color_num = (int)substr((string)crc32($category_name), 0, 1) % count($_CATEGORY_COLORS);
        array_push($product['categories'], array('name' => $category_name, 'color' => $_CATEGORY_COLORS[$color_num]));
    }

    echo $twig->render('product.html', array('product' => $product));
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

    if (isset($_GET['category'])) {
        $category = htmlspecialchars($_GET['category']);
    }
    
    $sql = "SELECT * FROM product_view ";

    if ((isset($search) && $search) OR (isset($category) && $category)) { $sql = $sql."WHERE"; }

    if (isset($search) && $search) { $sql = $sql." name LIKE '%".$search."%'"; }
    if ((isset($search) && $search) && (isset($category) && $category)) { $sql = $sql." AND"; }
    if (isset($category) && $category) { $sql = $sql." categories LIKE '%".$category."%'"; }

    $sql = $sql." ORDER BY name ASC LIMIT ".$_ITEMS_PER_PAGE." OFFSET ".$offset;

    $result = mysqli_query($conn, $sql);
    $products = array();
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($products, $row);
            }
        }
    }

    foreach ($products as &$product) {
        $categories = json_decode("[".$product['categories']."]");
        $product['categories'] = array();

        foreach ($categories as $category_name) {
            $color_num = (int)substr((string)crc32($category_name), 0, 1) % count($_CATEGORY_COLORS);
            array_push($product['categories'], array('name' => $category_name, 'color' => $_CATEGORY_COLORS[$color_num]));
        }
    }
    
    $vars = array('products' => $products, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE);
    if (isset($search) && $search) { $vars['search'] = $search; }
    if (isset($category) && $category) { $vars['category'] = $category; }
    
    echo $twig->render('products.html', $vars);
}

?>
