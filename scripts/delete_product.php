<?php

require_once '../global.php';

$product_id = htmlspecialchars($_GET['id']);

$sql = "UPDATE product SET is_deleted = 1 WHERE product_id = ".$product_id;

if (mysqli_query($conn, $sql)) {

    $sql = "DELETE FROM cart_item WHERE product_id = ".$product_id." AND product_seller_id = 1";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['flash'] = "Product deleted successfully";
        header('Location: '.$_ROOT.'/products/');
        return;
    }
}

echo "Error: " . $sql . "<br>" . mysqli_error($conn);

?>