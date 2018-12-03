<?php

require_once '../global.php';

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
if (isset($category) && $category) { $sql = $sql." category LIKE '%".$category."%'"; }

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
    $product['category_color'] = $_CATEGORY_COLORS[(int)substr((string)crc32($product['category']), 0, 1) % count($_CATEGORY_COLORS)];
}

$sql = "SELECT * FROM category_view";

$result = mysqli_query($conn, $sql);
$categories = array();

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($categories, $row['name']);
        }
    }
}

$vars = array('products' => $products, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE, 'categories' => $categories);
if (isset($search) && $search) { $vars['search'] = $search; }
if (isset($category) && $category) { $vars['category'] = $category; }

echo $twig->render('product_catalog.html', $vars);

?>
