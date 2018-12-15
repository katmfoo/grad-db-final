<?php

require_once '../global.php';

$customer_id = htmlspecialchars($_POST['customer_id']);
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zip = htmlspecialchars($_POST['zip']);
$country = htmlspecialchars($_POST['country']);

$sql = "CALL edit_customer('$customer_id', '$first_name', '$last_name', '$address', '$city', '$state', '$zip', '$country')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Customer edited successfully";
    header("Location: $_ROOT/customers/?id=$customer_id&seller_id=1");
    return;
} else {
    echo "Error: $sql <br>".mysqli_error($conn);
    return;
}

?>