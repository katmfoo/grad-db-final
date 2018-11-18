<?php

require_once '../../global.php';

$product_id = htmlspecialchars($_GET['id']);

$sql = "SELECT * FROM product WHERE product_id = ".$product_id;

$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

$sql = "SELECT supplier_id, supplier_name FROM supplier ORDER BY supplier_name ASC";
$result = mysqli_query($conn, $sql);
$suppliers = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($suppliers, $row);
    }
}

$sql = "SELECT category_id, name FROM category ORDER BY name ASC";
$result = mysqli_query($conn, $sql);
$categories = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($categories, $row);
    }
}

echo $twig->render('edit_product.html', array('product' => $product, 'suppliers' => $suppliers, 'categories' => $categories));

?>
