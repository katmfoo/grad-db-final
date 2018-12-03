<?php

require_once '../global.php';

$supplier_id = htmlspecialchars($_GET['id']);

$sql = "UPDATE supplier SET is_deleted = 1 WHERE supplier_id = $supplier_id";

if (mysqli_query($conn, $sql)) {
    $sql = "UPDATE product SET is_deleted = 1 WHERE supplier_id = $supplier_id";
    if (mysqli_query($conn, $sql)) {
        $sql = "DELETE cart_item FROM cart_item JOIN product ON cart_item.product_id = product.product_id WHERE product_seller_id = 1 AND product.supplier_id = $supplier_id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['flash'] = "Supplier deleted successfully";
            header("Location: $_ROOT/suppliers/");
            return;
        }
    }
}

echo "Error: $sql <br>".mysqli_error($conn);

?>