<?php

require_once '../global.php';

$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zip = htmlspecialchars($_POST['zip']);
$country = htmlspecialchars($_POST['country']);

$sql = "SELECT create_customer('$first_name', '$last_name', '$address', '$city', '$state', '$zip', '$country') as customer_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $customer_id = mysqli_fetch_assoc($result)['customer_id'];
    $_SESSION['flash'] = "Customer created successfully";
    header("Location: $_ROOT/customers/?id=$customer_id&seller_id=1");
    return;
} else {
    echo "Error: $sql <br>".mysqli_error($conn);
    return;
}

?>