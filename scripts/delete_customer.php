<?php

require_once '../global.php';

$customer_id = htmlspecialchars($_GET['id']);

$sql = "UPDATE customer SET is_deleted = 1 WHERE customer_id = $customer_id";

if (mysqli_query($conn, $sql)) {
    if (isset($_SESSION['current_customer_id']) && isset($_SESSION['current_customer_seller_id']) && $_SESSION['current_customer_seller_id'] == 1 && $_SESSION['current_customer_id'] == $customer_id) {
        unset($_SESSION['current_customer_id']);
        unset($_SESSION['current_customer_seller_id']);
    }

    $_SESSION['flash'] = "Customer deleted successfully";
    header("Location: $_ROOT/customers/");
    return;
} else {
    echo "Error: $sql <br>".mysqli_error($conn);
    return;
}

?>