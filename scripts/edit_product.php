<?php

require_once '../global.php';

$product_id = htmlspecialchars($_POST['product_id']);
$name = htmlspecialchars($_POST['name']);
$category_id = htmlspecialchars($_POST['category_id']);
$supplier_id = htmlspecialchars($_POST['supplier_id']);
$list_price = htmlspecialchars($_POST['list_price']);
$minimum_stock = htmlspecialchars($_POST['minimum_stock']);
$current_stock = htmlspecialchars($_POST['current_stock']);

$sql = "UPDATE product SET name = '$name', list_price = '$list_price', category_id = '$category_id', supplier_id = '$supplier_id', minimum_stock = '$minimum_stock', current_stock = '$current_stock' WHERE product_id = $product_id";

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Product edited successfully";
    header("Location: $_ROOT/products/?id=$product_id&seller_id=1");
    return;
} else {
    echo "Error: $sql <br>".mysqli_error($conn);
    return;
}

?>