<?php

require_once '../global.php';
require_once '../db.php';

$product_id = htmlspecialchars($_GET['id']);

$sql = "DELETE FROM product WHERE product_id = ".$product_id;

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Product deleted successfully";
    header('Location: '.$_ROOT.'/products/');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

?>