<?php

require_once '../global.php';
require_once '../db.php';

$name = htmlspecialchars($_POST['name']);
$supplier_id = htmlspecialchars($_POST['supplier_id']);
$list_price = htmlspecialchars($_POST['list_price']);
$minimum_stock = htmlspecialchars($_POST['minimum_stock']);
$current_stock = htmlspecialchars($_POST['current_stock']);

$sql = "INSERT INTO product (name, supplier_id, list_price, minimum_stock, current_stock) VALUES ('".$name."', '".$supplier_id."', '".$list_price."', '".$minimum_stock."', '".$current_stock."')";

if (mysqli_query($conn, $sql)) {
    $product_id = mysqli_insert_id($conn);
    $_SESSION['flash'] = "Product created successfully";
    header('Location: '.$_ROOT.'/product/?id='.$product_id.'&seller_id=1');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

?>