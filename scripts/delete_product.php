<?php

require_once '../global.php';

$product_id = htmlspecialchars($_GET['id']);

$sql = "CALL delete_product($product_id)";

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Product deleted successfully";
    header("Location: $_ROOT/products/");
    return;
}

echo "Error: $sql <br>".mysqli_error($conn);

?>